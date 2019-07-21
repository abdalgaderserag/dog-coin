<template>
    <div>
        <div v-if="data.length !== 0">
            <div id="chartContainer" style="height: 370px; width: 100%; margin: 0px auto;"></div>
        </div>
        <div v-else>
            <div style="padding: 5%;width: 67%;margin-left: 20%;">
                <span style="font-size: 3vh">There are no money transfer right now start transferring
                    <a href="/request/send" class="link-clear" style="text-decoration: underline">now!</a></span>
                <br>
                <span>Here will disapper chart viewing all your transfers.</span>
            </div>
        </div>
    </div>
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
                        gridThickness: 0,
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
                    array[i] = {
                        x: parseDate(this.data[i].created_at),
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