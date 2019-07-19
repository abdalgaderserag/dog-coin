<template>
    <div id="chartContainer" style="height: 370px; width: 100%; margin: 0px auto;"></div>
</template>

<script>
    export default {
        name: "Char",
        props: {
            data: {
                type: Array,
                required: true,
            }
        }, mounted() {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title: {
                    text: ""
                },
                axisX: {
                    valueFormatString: "DD MMM",
                    crosshair: {
                        enabled: true,
                        snapToDataPoint: true
                    }
                },
                axisY: {
                    title: "",
                    includeZero: false,
                    valueFormatString: "$##0.00",
                    crosshair: {
                        enabled: true,
                        snapToDataPoint: true,
                        labelFormatter: function (e) {
                            return "$" + CanvasJS.formatNumber(e.value, "##0.00");
                        }
                    }
                },
                data: [{
                    type: "area",
                    xValueFormatString: "DD MMM",
                    yValueFormatString: "$##0.00",
                    dataPoints: this.calArray(),
                }]
            });
            chart.render();
        }, methods: {
            calArray: function () {
                let array = [];
                for (let i = 0; i < this.data.length; i++) {
                    array[i] = {x: this.data[i].created_at, y: this.data[i].amount};
                }
                return array;
            }
        }
    }
</script>

<style scoped>

</style>