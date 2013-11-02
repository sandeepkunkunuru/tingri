<html>
<head>
<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
<script type="text/javascript">
d3.text("/datasets/apyv0.1.csv", function(datasetText) {

var parsedCSV = d3.csv.parseRows(datasetText);

var sampleHTML = d3.select("#viz")
    .append("table")
    .style("border-collapse", "collapse")
    .style("border", "2px black solid")

    .selectAll("tr")
    .data(parsedCSV)
    .enter().append("tr")

    .selectAll("td")
    .data(function(d){return d;})
    .enter().append("td")
    .style("border", "1px black solid")
    .style("padding", "5px")
    .on("mouseover", function(){d3.select(this).style("background-color", "aliceblue")})
    .on("mouseout", function(){d3.select(this).style("background-color", "white")})
    .text(function(d){return d;})
    .style("font-size", "12px");
});
</script>
</head>
<body>
	<div id="viz"></div>
</body>
</html>

