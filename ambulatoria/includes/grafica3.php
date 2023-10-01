<script>
  am5.ready(function() {


  let root = am5.Root.new("grafica3");


  root.setThemes([
    am5themes_Animated.new(root)
  ]);

  let chart = root.container.children.push(am5xy.XYChart.new(root, {
    panX: true,
    panY: true,
    wheelX: "panX",
    wheelY: "zoomX",
    scrollbarX: am5.Scrollbar.new(root, { orientation: "horizontal" }),
    scrollbarY: am5.Scrollbar.new(root, { orientation: "vertical" }),
    pinchZoomX: true
  }));


  let cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
  cursor.lineY.set("visible", false);


  let xRenderer = am5xy.AxisRendererX.new(root, {
    minGridDistance: 15
  });

  xRenderer.labels.template.setAll({
    rotation: -90,
    centerY: am5.p50,
    centerX: 0
  });

  xRenderer.grid.template.setAll({
    visible: false
  });

  let xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
    maxDeviation: 0.3,
    categoryField: "Medico",
    renderer: xRenderer,
    tooltip: am5.Tooltip.new(root, {})
  }));

  let yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
    maxDeviation: 0.3,
    renderer: am5xy.AxisRendererY.new(root, {})
    }));


  let series = chart.series.push(am5xy.ColumnSeries.new(root, {
    xAxis: xAxis,
    yAxis: yAxis,
    valueYField: "Promedio horas",
    categoryXField: "Medico",
    adjustBulletPosition: false,
    tooltip: am5.Tooltip.new(root, {
      labelText: "{Promedio horas}"
    })
  }));
  series.columns.template.setAll({
    width: 0.5
  });

  series.bullets.push(function() {
    return am5.Bullet.new(root, {
      locationY: 1,
      sprite: am5.Circle.new(root, {
        radius: 5,
        fill: series.get("fill")
      })
    })
  })

  let data = <?php echo json_encode($data_Promedio); ?>;
  console.log(data);

  xAxis.data.setAll(data);
  series.data.setAll(data);


  series.appear(1000);
  chart.appear(1000, 100);

  }); 
</script>