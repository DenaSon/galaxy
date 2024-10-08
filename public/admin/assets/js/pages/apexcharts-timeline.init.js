/*
Template Name: Tailwick - Admin & Dashboard Template
Author: Themesdesign
Version: 1.1.0
Website: https://themesdesign.in/
Contact: Themesdesign@gmail.com
File: charts apex Timeline init Js File
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

//basic
var options = {
    series: [
        {
            data: [
                {
                    x: 'Code',
                    y: [
                        new Date('2019-03-02').getTime(),
                        new Date('2019-03-04').getTime()
                    ]
                },
                {
                    x: 'Test',
                    y: [
                        new Date('2019-03-04').getTime(),
                        new Date('2019-03-08').getTime()
                    ]
                },
                {
                    x: 'Validation',
                    y: [
                        new Date('2019-03-08').getTime(),
                        new Date('2019-03-12').getTime()
                    ]
                },
                {
                    x: 'Deployment',
                    y: [
                        new Date('2019-03-12').getTime(),
                        new Date('2019-03-18').getTime()
                    ]
                }
            ]
        }
    ],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 350,
        type: 'rangeBar'
    },
    plotOptions: {
        bar: {
            horizontal: true
        }
    },
    colors: getChartColorsArray("basicTimeline"),
    xaxis: {
        type: 'datetime'
    }
};

var chart = new ApexCharts(document.querySelector("#basicTimeline"), options);
chart.render();

//Different Color For Each Bar
var options = {
    series: [
        {
            data: [
                {
                    x: 'Analysis',
                    y: [
                        new Date('2019-02-27').getTime(),
                        new Date('2019-03-04').getTime()
                    ],
                },
                {
                    x: 'Design',
                    y: [
                        new Date('2019-03-04').getTime(),
                        new Date('2019-03-08').getTime()
                    ],
                },
                {
                    x: 'Coding',
                    y: [
                        new Date('2019-03-07').getTime(),
                        new Date('2019-03-10').getTime()
                    ],
                },
                {
                    x: 'Testing',
                    y: [
                        new Date('2019-03-08').getTime(),
                        new Date('2019-03-12').getTime()
                    ],
                },
                {
                    x: 'Deployment',
                    y: [
                        new Date('2019-03-12').getTime(),
                        new Date('2019-03-17').getTime()
                    ],
                }
            ]
        }
    ],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 350,
        type: 'rangeBar'
    },
    colors: getChartColorsArray("colorTimeline"),
    plotOptions: {
        bar: {
            horizontal: true,
            distributed: true,
            dataLabels: {
                hideOverflowingLabels: false
            }
        }
    },
    dataLabels: {
        enabled: true,
        formatter: function (val, opts) {
            var label = opts.w.globals.labels[opts.dataPointIndex]
            var a = moment(val[0])
            var b = moment(val[1])
            var diff = b.diff(a, 'days')
            return label + ': ' + diff + (diff > 1 ? ' days' : ' day')
        },
    },
    xaxis: {
        type: 'datetime'
    },
    yaxis: {
        show: false
    },  
};

var chart = new ApexCharts(document.querySelector("#colorTimeline"), options);
chart.render();

//Multi-series
var options = {
    series: [
        {
            name: 'Bob',
            data: [
                {
                    x: 'Design',
                    y: [
                        new Date('2019-03-05').getTime(),
                        new Date('2019-03-08').getTime()
                    ]
                },
                {
                    x: 'Code',
                    y: [
                        new Date('2019-03-08').getTime(),
                        new Date('2019-03-11').getTime()
                    ]
                },
                {
                    x: 'Test',
                    y: [
                        new Date('2019-03-11').getTime(),
                        new Date('2019-03-16').getTime()
                    ]
                }
            ]
        },
        {
            name: 'Joe',
            data: [
                {
                    x: 'Design',
                    y: [
                        new Date('2019-03-02').getTime(),
                        new Date('2019-03-05').getTime()
                    ]
                },
                {
                    x: 'Code',
                    y: [
                        new Date('2019-03-06').getTime(),
                        new Date('2019-03-09').getTime()
                    ]
                },
                {
                    x: 'Test',
                    y: [
                        new Date('2019-03-10').getTime(),
                        new Date('2019-03-19').getTime()
                    ]
                }
            ]
        }
    ],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 350,
        type: 'rangeBar'
    },
    plotOptions: {
        bar: {
            horizontal: true
        }
    },
    dataLabels: {
        enabled: true,
        formatter: function (val) {
            var a = moment(val[0])
            var b = moment(val[1])
            var diff = b.diff(a, 'days')
            return diff + (diff > 1 ? ' days' : ' day')
        }
    },
    colors: getChartColorsArray("multiSeriesChart"),
    fill: {
        type: 'gradient',
        gradient: {
            shade: 'light',
            type: 'vertical',
            shadeIntensity: 0.25,
            gradientToColors: undefined,
            inverseColors: true,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [50, 0, 100, 100]
        }
    },
    xaxis: {
        type: 'datetime'
    },
    legend: {
        position: 'top'
    }
};

var chart = new ApexCharts(document.querySelector("#multiSeriesChart"), options);
chart.render();

//Advanced (Multiple ranges)
var options = {
    series: [
        {
            name: 'Bob',
            data: [
                {
                    x: 'Design',
                    y: [
                        new Date('2019-03-05').getTime(),
                        new Date('2019-03-08').getTime()
                    ]
                },
                {
                    x: 'Code',
                    y: [
                        new Date('2019-03-02').getTime(),
                        new Date('2019-03-05').getTime()
                    ]
                },
                {
                    x: 'Code',
                    y: [
                        new Date('2019-03-05').getTime(),
                        new Date('2019-03-07').getTime()
                    ]
                },
                {
                    x: 'Test',
                    y: [
                        new Date('2019-03-03').getTime(),
                        new Date('2019-03-09').getTime()
                    ]
                },
                {
                    x: 'Test',
                    y: [
                        new Date('2019-03-08').getTime(),
                        new Date('2019-03-11').getTime()
                    ]
                },
                {
                    x: 'Validation',
                    y: [
                        new Date('2019-03-11').getTime(),
                        new Date('2019-03-16').getTime()
                    ]
                },
                {
                    x: 'Design',
                    y: [
                        new Date('2019-03-01').getTime(),
                        new Date('2019-03-03').getTime()
                    ],
                }
            ]
        },
        {
            name: 'Joe',
            data: [
                {
                    x: 'Design',
                    y: [
                        new Date('2019-03-02').getTime(),
                        new Date('2019-03-05').getTime()
                    ]
                },
                {
                    x: 'Test',
                    y: [
                        new Date('2019-03-06').getTime(),
                        new Date('2019-03-16').getTime()
                    ],
                    goals: [
                        {
                            name: 'Break',
                            value: new Date('2019-03-10').getTime(),
                            strokeColor: '#CD2F2A'
                        }
                    ]
                },
                {
                    x: 'Code',
                    y: [
                        new Date('2019-03-03').getTime(),
                        new Date('2019-03-07').getTime()
                    ]
                },
                {
                    x: 'Deployment',
                    y: [
                        new Date('2019-03-20').getTime(),
                        new Date('2019-03-22').getTime()
                    ]
                },
                {
                    x: 'Design',
                    y: [
                        new Date('2019-03-10').getTime(),
                        new Date('2019-03-16').getTime()
                    ]
                }
            ]
        },
        {
            name: 'Dan',
            data: [
                {
                    x: 'Code',
                    y: [
                        new Date('2019-03-10').getTime(),
                        new Date('2019-03-17').getTime()
                    ]
                },
                {
                    x: 'Validation',
                    y: [
                        new Date('2019-03-05').getTime(),
                        new Date('2019-03-09').getTime()
                    ],
                    goals: [
                        {
                            name: 'Break',
                            value: new Date('2019-03-07').getTime(),
                            strokeColor: '#CD2F2A'
                        }
                    ]
                },
            ]
        }
    ],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 350,
        type: 'rangeBar'
    },
    plotOptions: {
        bar: {
            horizontal: true,
            barHeight: '80%'
        }
    },
    xaxis: {
        type: 'datetime'
    },
    stroke: {
        width: 1
    },
    fill: {
        type: 'solid',
        opacity: 0.6
    },
    colors: getChartColorsArray("advancedMultipleRanges"),
    legend: {
        position: 'top',
        horizontalAlign: 'left'
    }
};

var chart = new ApexCharts(document.querySelector("#advancedMultipleRanges"), options);
chart.render();

//Multiple series – Group rows
var options = {
    series: [
        // George Washington
        {
            name: 'George Washington',
            data: [
                {
                    x: 'President',
                    y: [
                        new Date(1789, 3, 30).getTime(),
                        new Date(1797, 2, 4).getTime()
                    ]
                },
            ]
        },
        // John Adams
        {
            name: 'John Adams',
            data: [
                {
                    x: 'President',
                    y: [
                        new Date(1797, 2, 4).getTime(),
                        new Date(1801, 2, 4).getTime()
                    ]
                },
                {
                    x: 'Vice President',
                    y: [
                        new Date(1789, 3, 21).getTime(),
                        new Date(1797, 2, 4).getTime()
                    ]
                }
            ]
        },
        // Thomas Jefferson
        {
            name: 'Thomas Jefferson',
            data: [
                {
                    x: 'President',
                    y: [
                        new Date(1801, 2, 4).getTime(),
                        new Date(1809, 2, 4).getTime()
                    ]
                },
                {
                    x: 'Vice President',
                    y: [
                        new Date(1797, 2, 4).getTime(),
                        new Date(1801, 2, 4).getTime()
                    ]
                },
                {
                    x: 'Secretary of State',
                    y: [
                        new Date(1790, 2, 22).getTime(),
                        new Date(1793, 11, 31).getTime()
                    ]
                }
            ]
        },
        // Aaron Burr
        {
            name: 'Aaron Burr',
            data: [
                {
                    x: 'Vice President',
                    y: [
                        new Date(1801, 2, 4).getTime(),
                        new Date(1805, 2, 4).getTime()
                    ]
                }
            ]
        },
        // George Clinton
        {
            name: 'George Clinton',
            data: [
                {
                    x: 'Vice President',
                    y: [
                        new Date(1805, 2, 4).getTime(),
                        new Date(1812, 3, 20).getTime()
                    ]
                }
            ]
        },
        // John Jay
        {
            name: 'John Jay',
            data: [
                {
                    x: 'Secretary of State',
                    y: [
                        new Date(1789, 8, 25).getTime(),
                        new Date(1790, 2, 22).getTime()
                    ]
                }
            ]
        },
        // Edmund Randolph
        {
            name: 'Edmund Randolph',
            data: [
                {
                    x: 'Secretary of State',
                    y: [
                        new Date(1794, 0, 2).getTime(),
                        new Date(1795, 7, 20).getTime()
                    ]
                }
            ]
        },
        // Timothy Pickering
        {
            name: 'Timothy Pickering',
            data: [
                {
                    x: 'Secretary of State',
                    y: [
                        new Date(1795, 7, 20).getTime(),
                        new Date(1800, 4, 12).getTime()
                    ]
                }
            ]
        },
        // Charles Lee
        {
            name: 'Charles Lee',
            data: [
                {
                    x: 'Secretary of State',
                    y: [
                        new Date(1800, 4, 13).getTime(),
                        new Date(1800, 5, 5).getTime()
                    ]
                }
            ]
        },
        // John Marshall
        {
            name: 'John Marshall',
            data: [
                {
                    x: 'Secretary of State',
                    y: [
                        new Date(1800, 5, 13).getTime(),
                        new Date(1801, 2, 4).getTime()
                    ]
                }
            ]
        },
        // Levi Lincoln
        {
            name: 'Levi Lincoln',
            data: [
                {
                    x: 'Secretary of State',
                    y: [
                        new Date(1801, 2, 5).getTime(),
                        new Date(1801, 4, 1).getTime()
                    ]
                }
            ]
        },
        // James Madison
        {
            name: 'James Madison',
            data: [
                {
                    x: 'Secretary of State',
                    y: [
                        new Date(1801, 4, 2).getTime(),
                        new Date(1809, 2, 3).getTime()
                    ]
                }
            ]
        },
    ],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 350,
        type: 'rangeBar'
    },
    plotOptions: {
        bar: {
            horizontal: true,
            barHeight: '50%',
            rangeBarGroupRows: true
        }
    },
    colors: getChartColorsArray("multipleSeriesGroupRows"),
    fill: {
        type: 'solid'
    },
    xaxis: {
        type: 'datetime'
    },
    legend: {
        position: 'right'
    },
    tooltip: {
        custom: function (opts) {
            const fromYear = new Date(opts.y1).getFullYear()
            const toYear = new Date(opts.y2).getFullYear()
            const values = opts.ctx.rangeBar.getTooltipValues(opts)

            return (
                ''
            )
        }
    }
};

var chart = new ApexCharts(document.querySelector("#multipleSeriesGroupRows"), options);
chart.render();

//Dumbbell Chart (Horizontal)
var options = {
    series: [
        {
            data: [
                {
                    x: 'Operations',
                    y: [2800, 4500]
                },
                {
                    x: 'Customer Success',
                    y: [3200, 4100]
                },
                {
                    x: 'Engineering',
                    y: [2950, 7800]
                },
                {
                    x: 'Marketing',
                    y: [3000, 4600]
                },
                {
                    x: 'Product',
                    y: [3500, 4100]
                },
                {
                    x: 'Data Science',
                    y: [4500, 6500]
                },
                {
                    x: 'Sales',
                    y: [4100, 5600]
                }
            ]
        }
    ],
    chart: {
        fontFamily: 'Vazirmatn, Arial, sans-serif',
        height: 350,
        type: 'rangeBar',
        zoom: {
            enabled: false
        }
    },
    plotOptions: {
        bar: {
            horizontal: true,
            isDumbbell: true,
            dumbbellColors: [[getChartColorsArray("multipleSeriesGroupRows")[0], getChartColorsArray("multipleSeriesGroupRows")[1]]]
        }
    },
    title: {
        text: 'Paygap Disparity'
    },
    legend: {
        show: true,
        showForSingleSeries: true,
        position: 'top',
        horizontalAlign: 'left',
        customLegendItems: ['Female', 'Male']
    },
    fill: {
        type: 'gradient',
        gradient: {
            gradientToColors: [getChartColorsArray("dumbbellChart")[1]],
            inverseColors: false,
            stops: [0, 100]
        }
    },
    grid: {
        xaxis: {
            lines: {
                show: true
            }
        },
        yaxis: {
            lines: {
                show: false
            }
        }
    }
};

var chart = new ApexCharts(document.querySelector("#dumbbellChart"), options);
chart.render();