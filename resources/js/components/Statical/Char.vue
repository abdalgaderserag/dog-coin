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
            this.renderChar();
        }, methods: {
            renderChar: function () {
                let chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    title: {
                        text: ""
                    },
                    axisX: {
                        valueFormatString: "DD MMM H M SS",
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
            },
            calArray: function () {
                let array = [];

                for (let i = 0; i < this.data.length; i++) {
                    let date = this.data[i].created_at;
                    let temp;
                    date = date.split('-');
                    temp = date[2].split(' ');
                    date[2] = temp[0];
                    temp = temp[1].split(':');
                    array[i] = {
                        x: new Date(date[0], date[1], date[2], temp[0], temp[1], temp[2],),
                        y: this.data[i].amount
                    };
                }

                return array;
            }
        }
    }
</script>

<style scoped>

</style>