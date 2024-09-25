// async IIFE
(async () => {
  const dataResponse = await fetch(plotgraph1.json);
  const data = await dataResponse.json();
  console.log(data);

  const plot = Plot.plot({
    x: { grid: true, label: "Années" },
    y: { grid: true, label: "Gains en euros" },
    color: { legend: true },
    title: "Evolution des gains du vainqueur du grand chelem",
    subtitle: "Evoluiton des gains en euros du grand chelem de 1968 à 2022",
    marginLeft: 55,
    marks: [
      Plot.lineY(data, {
        x: "YEAR",
        y: "WINNER_PRIZE",
        stroke: "TOURNAMENT",
        tip: true,
      }),
    ],
  });

  const div = document.querySelector("#graph1");
  div.append(plot);
})();
