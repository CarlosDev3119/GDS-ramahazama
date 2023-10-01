<script>
  $(function() {
    // Inicializar los selectores de fechas
    $("#fechaInicio").datepicker();
    $("#fechaFin").datepicker();
  });
  am5.ready(function() {

  let root = am5.Root.new("grafica1");

  root.setThemes([
    am5themes_Animated.new(root)
  ]);

  let chart = root.container.children.push(am5percent.PieChart.new(root, {
    radius: am5.percent(90),
    innerRadius: am5.percent(50),
    layout: root.horizontalLayout
  }));

  let series = chart.series.push(am5percent.PieSeries.new(root, {
    name: "Series",
    valueField: "UsoSalas",
    categoryField: "Sala"
  }));

  series.data.setAll(<?php echo json_encode($data_usoSalas); ?>);

  series.labels.template.set("visible", false);
  series.ticks.template.set("visible", false);

  series.slices.template.set("strokeOpacity", 0);
  series.slices.template.set("fillGradient", am5.RadialGradient.new(root, {
    stops: [{
      brighten: -0.8
    }, {
      brighten: -0.8
    }, {
      brighten: -0.5
    }, {
      brighten: 0
    }, {
      brighten: -0.5
    }]
  }));

  let legend = chart.children.push(am5.Legend.new(root, {
    centerY: am5.percent(50),
    y: am5.percent(50),
    layout: root.verticalLayout
  }));
  legend.valueLabels.template.setAll({ textAlign: "right" })
  legend.labels.template.setAll({ 
    maxWidth: 140,
    width: 140,
    oversizedBehavior: "wrap"
  });

  legend.data.setAll(series.dataItems);

  series.appear(1000, 100);

  });
</script>