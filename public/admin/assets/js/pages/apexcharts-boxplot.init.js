/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Version: 1.1.0
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: charts apex boxplot init Js File
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

//basic chart
var options = {
    series: [
        {
            type: 'boxPlot',
            data: [
                {
                    x: 'Jan 2015',
                    y: [54, 66, 69, 75, 88]
                },
                {
                    x: 'Jan 2016',
                    y: [43, 65, 69, 76, 81]
                },
                {
                    x: 'Jan 2017',
                    y: [31, 39, 45, 51, 59]
                },
                {
                    x: 'Jan 2018',
                    y: [39, 46, 55, 65, 71]
                },
                {
                    x: 'Jan 2019',
                    y: [29, 31, 35, 39, 44]
                },
                {
                    x: 'Jan 2020',
                    y: [41, 49, 58, 61, 67]
                },
                {
                    x: 'Jan 2021',
                    y: [54, 59, 66, 71, 88]
                }
            ]
        }
    ],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        type: 'boxPlot',
        height: 350
    },
    plotOptions: {
        boxPlot: {
            colors: {
                upper: getChartColorsArray("basicBoxplot")[0],
                lower: getChartColorsArray("basicBoxplot")[1]
            }
        }
    }
};

var chart = new ApexCharts(document.querySelector("#basicBoxplot"), options);
chart.render();

//Boxplot-Scatter
var options = {
    series: [
        {
            name: 'box',
            type: 'boxPlot',
            data: [
                {
                    x: new Date('2017-01-01').getTime(),
                    y: [54, 66, 69, 75, 88]
                },
                {
                    x: new Date('2018-01-01').getTime(),
                    y: [43, 65, 69, 76, 81]
                },
                {
                    x: new Date('2019-01-01').getTime(),
                    y: [31, 39, 45, 51, 59]
                },
                {
                    x: new Date('2020-01-01').getTime(),
                    y: [39, 46, 55, 65, 71]
                },
                {
                    x: new Date('2021-01-01').getTime(),
                    y: [29, 31, 35, 39, 44]
                }
            ]
        },
        {
            name: 'outliers',
            type: 'scatter',
            data: [
                {
                    x: new Date('2017-01-01').getTime(),
                    y: 32
                },
                {
                    x: new Date('2018-01-01').getTime(),
                    y: 25
                },
                {
                    x: new Date('2019-01-01').getTime(),
                    y: 64
                },
                {
                    x: new Date('2020-01-01').getTime(),
                    y: 27
                },
                {
                    x: new Date('2020-01-01').getTime(),
                    y: 78
                },
                {
                    x: new Date('2021-01-01').getTime(),
                    y: 15
                }
            ]
        }
    ],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        type: 'boxPlot',
        height: 350
    },
    plotOptions: {
        boxPlot: {
            colors: {
                upper: getChartColorsArray("boxplotScatterChart")[0],
                lower: getChartColorsArray("boxplotScatterChart")[1]
            }
        }
    },
    xaxis: {
        type: 'datetime',
        tooltip: {
            formatter: function (val) {
                return new Date(val).getFullYear()
            }
        }
    },
    tooltip: {
        shared: false,
        intersect: true
    }
};

var chart = new ApexCharts(document.querySelector("#boxplotScatterChart"), options);
chart.render();

//Horizontal BoxPlot
var options = {
    series: [
        {
            data: [
                {
                    x: 'Category A',
                    y: [54, 66, 69, 75, 88]
                },
                {
                    x: 'Category B',
                    y: [43, 65, 69, 76, 81]
                },
                {
                    x: 'Category C',
                    y: [31, 39, 45, 51, 59]
                },
                {
                    x: 'Category D',
                    y: [39, 46, 55, 65, 71]
                },
                {
                    x: 'Category E',
                    y: [29, 31, 35, 39, 44]
                },
                {
                    x: 'Category F',
                    y: [41, 49, 58, 61, 67]
                },
                {
                    x: 'Category G',
                    y: [54, 59, 66, 71, 88]
                }
            ]
        }
    ],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        type: 'boxPlot',
        height: 350
    },
    plotOptions: {
        bar: {
            horizontal: true,
            barHeight: '50%'
        },
        boxPlot: {
            colors: {
                upper: getChartColorsArray("boxplotHorizontalChart")[0],
                lower: getChartColorsArray("boxplotHorizontalChart")[1]
            }
        }
    },
};

var chart = new ApexCharts(document.querySelector("#boxplotHorizontalChart"), options);
chart.render();