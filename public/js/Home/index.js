var margin = {top: 20, right: 10, bottom: 5, left: 30}, 
width = window.outerWidth * (100 - margin.left - margin.right)/100
height = window.outerHeight * (100- margin.top - margin.bottom)/100;


var x = d3.scaleLinear().range([0, width]);
var y = d3.scaleLinear().range([height, 0]);


var valueline = d3
				.line()
				.x(function(d) { return x(d['tmp[C]']); })
				.y(function(d) { return y(d['hs[m]']); });


function RandomData()
{
	if(display.url=='random_data')
	{
		display.url = ''; 
	}
	else 
	{
		display.url = 'random_data'; 
	}
}


var display = new Vue 
(
	{
		el: '#display', 
		data: 
		{
			url: "full_data" 
		}, 
		computed: 
		{
			Data: function()
			{
				var data = AjaxRequest(this.url); 
				return JSON.parse(data); 
			}
		}, 
		mounted: function()
		{
			this.DrawGraph(); 
		}, 
		methods: 
		{
			DrawGraph: function()
			{
				var data = this.Data; 
				var svg = d3.select("#display").append("svg")
	            .attr("width", width + (margin.left + margin.right)*window.outerWidth/100)
	            .attr("height", height + (margin.top + margin.bottom) * window.outerHeight/100)
	            .append("g").attr("transform",
	               "translate(" + margin.left + "," + margin.top + ")");


				x.domain(d3.extent(data, function(d) { return d['tmp[C]']; }));
				y.domain([0, d3.max(data, function(d) { return d['hs[m]']; })]);


				svg
					.append('g')
					.selectAll('dot')
					.data(data)
				    .enter()
				    .append("circle")
					.attr("cx", function (d) { return x(d['tmp[C]']); } )
					.attr("cy", function (d) { return y(d['hs[m]']); } )
					.attr("r", 1.5)
					.style("fill", "#69b3a2")


				svg
					.append("g")
					.attr("transform", "translate(0," + height + ")")
					.call(d3.axisBottom(x));

				svg
					.append("g")
					.call(d3.axisLeft(y));
			}
		}, 
		watch: 
		{
			url: function()
			{
				if(this.url=='')
				{
					this.url = 'random_data'; 
					return; 
				}
				$("#display").html(''); 
				this.DrawGraph(); 		
			}
		}
	}
); 

var test = AjaxRequest('random_data'); 

function AjaxRequest(url, data={})
{
	var result = null; 

	$.ajax 
	(
		{
			url: url, 
			type: 'get',
			async: false, 
			data: data, 
			success:function(success)
			{
				result = success; 
			}, 
			error: function(error)
			{
				console.log("error"); 
				result = error; 
			}
		}
	); 
	return result; 
}