<template>
    <div class="money-view card view-stat" :style="'background-color: ' + color">

        <div style="width: inherit;height: inherit;">
            <!--<div style="position: absolute;flex-direction: column;height: 260px;justify-content: space-around;" class="flex-box">-->
                <!--<span v-for="num in Math.round(horLine / 5)" class="flex-box">{{ Math.round(horLine / 5) - num + 1 }}</span>-->
            <!--</div>-->
            <svg style="width: inherit;height: inherit;border-radius: 4px">
                <path v-for="number in horLine"
                      :d="'M '+ number * horSpace +',0 '+ number * horSpace +',' + height"
                      :style="'fill:none;stroke:'+ linesColor +';stroke-width:'+ strokeWidthPx(number)
                      +'px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1'"/>
                :style="'fill:none;stroke:'+ lineColor +';stroke-width:'+ strokeWidthPx(number)
                +'px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1'"/>


                <path v-for="number in verLine"
                      :d="'m 0,'+ (height - (number * horSpace)) +' ' + width + ',0'"
                      :style="'fill:none;stroke:'+linesColor+';stroke-width:'+strokeWidth
                      +'px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1'"/>

                <path :d="line"
                      :style="'fill:none;stroke:'+ lineColor +';stroke-width: '+ strokeWidthLine +'px;stroke-opacity: 1'"/>
            </svg>

            <div class="flex-box" style="justify-content: space-between;font-size: 1.6vh">
                <span v-for="item in data">{{ item[secondKey].slice(0,10) }}</span>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "StaticalView",
        data() {
            return {
                verLine: 0,
                horLine: 58,
                linesColor: '#c4cdd17d',
                lineColor: '#ff3c04',
                color: '#fff',
                strokeWidthLine: 2,
                height: 0,
                width: 0,
                strokeWidth: 1,
                horSpace: 0,
                line: '',
                firstKey: 'amount',
                secondKey: 'created_at',
            }
        },
        props: {
            data: {
                type: Array,
                required: true,
            },
            max: {
                type: Number,
                required: true,
            }
        },
        mounted() {
            this.showView();
            this.line = "m -" + (20 * this.strokeWidth + 20) + "," + this.height;
            let array = this.data;
            let max = this.max * 1.5;
            let block = max / this.verLine;
            let position = this.width / (array.length - 1);
            // let position = this.horSpace;
            this.line = this.line + ' ' + (20 * this.strokeWidth + 20) + ',-' + (this.horSpace * (array[0][this.firstKey] / block));
            for (let i = 1; i < array.length; i++) {
                var size;
                size = ((array[(i - 1)][this.firstKey] - array[i][this.firstKey]) / block) * this.horSpace;
                this.line = this.line + ' ' + position + ',' + (size) + '';
            }
        },
        methods: {
            linePath: function (array, number) {

            },
            strokeWidthPx: function (number) {
                return this.strokeWidth;
                if (number % 4 !== 0)
                    return this.strokeWidth;
                return 3;
            },
            showView: function () {
                let view = this.$el;
                let width;
                if ((width = view.offsetWidth % this.horLine) !== 0) {
                    width = 24 - width;
                    width = view.offsetWidth + width;
                }
                this.horSpace = width / this.horLine;
                this.verLine = Math.round(view.offsetHeight / this.horSpace);
                this.height = view.offsetHeight;
                this.width = view.offsetWidth;
            }
        }
    }
</script>

<style>

</style>