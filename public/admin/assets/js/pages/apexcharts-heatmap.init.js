/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Version: 1.1.0
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: charts apex heatmap init Js File
*/

// rgb to hex convert
function rgbToHex(rgb) {
    // Extract RGB values using regular expressions
    const rgbValues = rgb.match(/\d+/g);

    if (rgbValues.length === 3) {
        var [r, g, b] = rgbValues.map(Number);
    }
    // Ensure the values are within the valid range (0-255)
    r = Math.max(0, Math.min(255, r));
    g = Math.max(0, Math.min(255, g));
    b = Math.max(0, Math.min(255, b));

    // Convert each component to its hexadecimal representation
    const rHex = r.toString(16).padStart(2, '0');
    const gHex = g.toString(16).padStart(2, '0');
    const bHex = b.toString(16).padStart(2, '0');

    // Combine the hexadecimal values with the "#" prefix
    const hexColor = `#${rHex}${gHex}${bHex}`;

    return hexColor.toUpperCase(); // Convert to uppercase for consistency
}

// common function to get charts colors from class
function getChartColorsArray(chartId) {
    const chartElement = document.getElementById(chartId);
    if (chartElement) {
        const colors = chartElement.dataset.chartColors;
        if (colors) {
            const parsedColors = JSON.parse(colors);
            const mappedColors = parsedColors.map((value) => {
                const newValue = value.replace(/\s/g, "");
                if (!newValue.includes("#")) {
                    const element = document.querySelector(newValue);
                    if (element) {
                        const styles = window.getComputedStyle(element);
                        const backgroundColor = styles.backgroundColor;
                        return backgroundColor || newValue;
                    } else {
                        const divElement = document.createElement('div');
                        divElement.className = newValue;
                        document.body.appendChild(divElement);

                        const styles = window.getComputedStyle(divElement);
                        const backgroundColor = styles.backgroundColor.includes("#") ? styles.backgroundColor : rgbToHex(styles.backgroundColor);
                        return backgroundColor || newValue;
                    }
                } else {
                    return newValue;
                }
            });
            return mappedColors;
        } else {
            console.warn(`chart-colors attribute not found on: ${chartId}`);
        }
    }
}

function generateData(count, yrange) {
    var i = 0;
    var series = [];
    while (i < count) {
        var x = (i + 1).toString();
        var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

        series.push({
            x: x,
            y: y
        });
        i++;
    }
    return series;
}

//Basic
var options = {
    series: [{
        name: 'Metric1',
        data: generateData(18, {
            min: 0,
            max: 90
        })
    },
    {
        name: 'Metric2',
        data: generateData(18, {
            min: 0,
            max: 90
        })
    },
    {
        name: 'Metric3',
        data: generateData(18, {
            min: 0,
            max: 90
        })
    },
    {
        name: 'Metric4',
        data: generateData(18, {
            min: 0,
            max: 90
        })
    },
    {
        name: 'Metric5',
        data: generateData(18, {
            min: 0,
            max: 90
        })
    },
    {
        name: 'Metric6',
        data: generateData(18, {
            min: 0,
            max: 90
        })
    },
    {
        name: 'Metric7',
        data: generateData(18, {
            min: 0,
            max: 90
        })
    },
    {
        name: 'Metric8',
        data: generateData(18, {
            min: 0,
            max: 90
        })
    },
    {
        name: 'Metric9',
        data: generateData(18, {
            min: 0,
            max: 90
        })
    }
    ],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 350,
        type: 'heatmap',
    },
    dataLabels: {
        enabled: false
    },
    colors: getChartColorsArray("basicHeatmap"),
};

var chart = new ApexCharts(document.querySelector("#basicHeatmap"), options);
chart.render();

//Multiple Colors
var data = [{
    name: 'W1',
    data: generateData(8, {
        min: 0,
        max: 90
    })
},
{
    name: 'W2',
    data: generateData(8, {
        min: 0,
        max: 90
    })
},
{
    name: 'W3',
    data: generateData(8, {
        min: 0,
        max: 90
    })
},
{
    name: 'W4',
    data: generateData(8, {
        min: 0,
        max: 90
    })
},
{
    name: 'W5',
    data: generateData(8, {
        min: 0,
        max: 90
    })
},
{
    name: 'W6',
    data: generateData(8, {
        min: 0,
        max: 90
    })
},
{
    name: 'W7',
    data: generateData(8, {
        min: 0,
        max: 90
    })
},
{
    name: 'W8',
    data: generateData(8, {
        min: 0,
        max: 90
    })
},
{
    name: 'W9',
    data: generateData(8, {
        min: 0,
        max: 90
    })
},
{
    name: 'W10',
    data: generateData(8, {
        min: 0,
        max: 90
    })
},
{
    name: 'W11',
    data: generateData(8, {
        min: 0,
        max: 90
    })
},
{
    name: 'W12',
    data: generateData(8, {
        min: 0,
        max: 90
    })
},
{
    name: 'W13',
    data: generateData(8, {
        min: 0,
        max: 90
    })
},
{
    name: 'W14',
    data: generateData(8, {
        min: 0,
        max: 90
    })
},
{
    name: 'W15',
    data: generateData(8, {
        min: 0,
        max: 90
    })
}
]

data.reverse()


var options = {
    series: data,
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 350,
        type: 'heatmap',
    },
    dataLabels: {
        enabled: false
    },
    colors: getChartColorsArray("multipleColorsHeatmap"),
    _xaxis: {
        type: 'category',
        categories: ['10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '01:00', '01:30']
    },
    get xaxis() {
        return this._xaxis;
    },
    set xaxis(value) {
        this._xaxis = value;
    },
    grid: {
        padding: {
            right: 20
        }
    }
};

var chart = new ApexCharts(document.querySelector("#multipleColorsHeatmap"), options);
chart.render();

//Color Range
var options = {
    series: [{
        name: 'Jan',
        data: generateData(20, {
            min: -30,
            max: 55
        })
    },
    {
        name: 'Feb',
        data: generateData(20, {
            min: -30,
            max: 55
        })
    },
    {
        name: 'Mar',
        data: generateData(20, {
            min: -30,
            max: 55
        })
    },
    {
        name: 'Apr',
        data: generateData(20, {
            min: -30,
            max: 55
        })
    },
    {
        name: 'May',
        data: generateData(20, {
            min: -30,
            max: 55
        })
    },
    {
        name: 'Jun',
        data: generateData(20, {
            min: -30,
            max: 55
        })
    },
    {
        name: 'Jul',
        data: generateData(20, {
            min: -30,
            max: 55
        })
    },
    {
        name: 'Aug',
        data: generateData(20, {
            min: -30,
            max: 55
        })
    },
    {
        name: 'Sep',
        data: generateData(20, {
            min: -30,
            max: 55
        })
    }
    ],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 350,
        type: 'heatmap',
    },
    plotOptions: {
        heatmap: {
            shadeIntensity: 0.5,
            radius: 0,
            useFillColorAsStroke: true,
        }
    },
    colors: getChartColorsArray("ColorsRangeHeatmap"),
    dataLabels: {
        enabled: false
    },
    stroke: {
        width: 1
    },
    title: {
        text: 'HeatMap Chart with Color Range'
    },
};

var chart = new ApexCharts(document.querySelector("#ColorsRangeHeatmap"), options);
chart.render();

//Rounded (Range without Shades)
var options = {
    series: [{
        name: 'Metric1',
        data: generateData(20, {
            min: 0,
            max: 90
        })
    },
    {
        name: 'Metric2',
        data: generateData(20, {
            min: 0,
            max: 90
        })
    },
    {
        name: 'Metric3',
        data: generateData(20, {
            min: 0,
            max: 90
        })
    },
    {
        name: 'Metric4',
        data: generateData(20, {
            min: 0,
            max: 90
        })
    },
    {
        name: 'Metric5',
        data: generateData(20, {
            min: 0,
            max: 90
        })
    },
    {
        name: 'Metric6',
        data: generateData(20, {
            min: 0,
            max: 90
        })
    },
    {
        name: 'Metric7',
        data: generateData(20, {
            min: 0,
            max: 90
        })
    },
    {
        name: 'Metric8',
        data: generateData(20, {
            min: 0,
            max: 90
        })
    },
    {
        name: 'Metric8',
        data: generateData(20, {
            min: 0,
            max: 90
        })
    }
    ],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 350,
        type: 'heatmap',
    },
    stroke: {
        width: 0
    },
    plotOptions: {
        heatmap: {
            radius: 30,
            enableShades: false,
        }
    },
    colors: getChartColorsArray("RoundedRangeHeatmap"),
    dataLabels: {
        enabled: true,
        style: {
            colors: ['#fff']
        }
    },
    xaxis: {
        type: 'category',
    },
};

var chart = new ApexCharts(document.querySelector("#RoundedRangeHeatmap"), options);
chart.render();