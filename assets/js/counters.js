/**
 * Animación de números en estadísticas (data-counter-target).
 * Valores desde API; si falla el fetch, todo en 0.
 */

const STATS_URL = "https://ondeck.nodo-digital.com/api/stats";

function easeOutCubic(t) {
  return 1 - (1 - t) ** 3;
}

/**
 * @param {Record<string, number>} stats
 */
function applyStatsToElements(root, stats) {
  root.querySelectorAll("[data-counter-stat]").forEach((el) => {
    const key = el.getAttribute("data-counter-stat");
    if (!key) return;
    const raw = stats[key];
    const n = typeof raw === "number" && Number.isFinite(raw) ? Math.max(0, Math.floor(raw)) : 0;
    el.setAttribute("data-counter-target", String(n));
  });
}

/**
 * @returns {Promise<Record<string, number>>}
 */
async function fetchStats() {
  const empty = {
    participantes: 0,
    publicados: 0,
    paises: 0,
    archivos_total: 0,
  };
  try {
    const res = await fetch(STATS_URL, {
      credentials: "omit",
      headers: { Accept: "application/json" },
    });
    if (!res.ok) return empty;
    const data = await res.json();
    if (!data || typeof data !== "object" || data.error) return empty;
    return {
      participantes: Number(data.participantes) || 0,
      publicados: Number(data.publicados) || 0,
      paises: Number(data.paises) || 0,
      archivos_total: Number(data.archivos_total) || 0,
    };
  } catch {
    return empty;
  }
}

export async function initCounters(containerSelector = ".section-stats") {
  const root = document.querySelector(containerSelector);
  if (!root) return;

  const items = root.querySelectorAll("[data-counter-target]");
  if (!items.length || !("IntersectionObserver" in window)) return;

  const stats = await fetchStats();
  applyStatsToElements(root, stats);

  const animateOne = (el) => {
    const raw = el.getAttribute("data-counter-target") ?? "0";
    const suffix = el.getAttribute("data-counter-suffix") ?? "";
    const isFloat = raw.includes(".");
    const target = parseFloat(raw.replace(/[^\d.]/g, ""));
    if (Number.isNaN(target)) return;

    if (target === 0) {
      el.textContent = "0" + suffix;
      return;
    }

    const duration = 1400;
    const start = performance.now();

    const frame = (now) => {
      const t = Math.min(1, (now - start) / duration);
      const v = easeOutCubic(t) * target;
      const display = isFloat
        ? v.toFixed(raw.split(".")[1]?.length ?? 1)
        : String(Math.round(v));
      el.textContent = display + suffix;
      if (t < 1) requestAnimationFrame(frame);
    };
    requestAnimationFrame(frame);
  };

  const io = new IntersectionObserver(
    (entries, obs) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        const wrap = entry.target;
        wrap.querySelectorAll("[data-counter-target]").forEach((el) => {
          if (el.getAttribute("data-counter-done")) return;
          el.setAttribute("data-counter-done", "1");
          animateOne(el);
        });
        obs.unobserve(wrap);
      });
    },
    { threshold: 0.25 }
  );

  io.observe(root);
}
