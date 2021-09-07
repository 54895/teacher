<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php $name=$_GET['test'];
    print($name);
    ?>老师 - 教师节快乐</title>
  <script src="./font/iconfont.js"></script>
  <script src="./echarts.min.js"></script>
  <style>
    html, body {
      width: 100%;
      height: 100%;
      margin: 0;
      background-image: url(./bg.png);
      background-repeat: no-repeat;
      background-size: 100% 100%;
      overflow: hidden;
    }
    #main {
      position: relative;
      width: 100%;
      height: 100%;
      z-index: 2;
      transform: rotate3d(0deg);
    }
    #word {
      position: absolute;
      display: flex;
      justify-content: center;
      align-items: center;
      bottom: 8%;
      width: 100%;
      height: 150px;
      font-size: 5em;
      transform: skewX(-15deg);
    }
    .word {
      letter-spacing: 5px;
      animation: changeColor 4s linear 0s infinite alternate;
    }
    @keyframes changeColor {
      0% {
        color: #f1ad32;
      }
      25% {
        color: #fa71b5;
      }
      50% {
        color: #fcaa02;
      }
      75% {
        color: #adbdf7;
      }
      100% {
        color: #c2cd07;
      }
    }
  </style>
</head>
<body><audio src="https://sharefs.ali.kugou.com/202109062205/37226c47f99254ff5a95b61140b69093/KGTX/CLTX001/d485a35ffb9c1eb36840c3d7e461accf.mp3"></audio>
  <div id="main"></div>
  <div id="word">
    <span class="word"><?php $name=$_GET['test'];
    print($name);
    ?>老师您辛苦了！<br>👩‍🏫教师节快乐👨‍🏫</span>
  </div>


  <script>
    const cos = Math.cos
    const sin = Math.sin
    const PI = Math.PI
    const random = Math.random
    const floor = Math.floor

    const scatterName = '<?php $name=$_GET['test'];
    print($name);
    ?>老师您辛苦了！教师节快乐'
    const effectName = '💐🌹<?php $name=$_GET['test'];
    print($name);
    ?>老师，教师节快乐！🌹💐'

    // 书籍的 svg
    const book = 'image://./book.svg'
    // 小爱心的 svg path
    const heart = 'path://m314.347483,160.37842c8.062623,-21.656503 39.652243,0 0,27.844075c-39.652243,-27.844075 -8.062623,-49.500578 0,-27.844075z'
    // 师说
    const words = ["古之学者必有师", "师者", "所以传道受业解惑也", "人非生而知之者", "孰能无惑？", "惑而不从师", "其为惑也", "终不解矣", "生乎吾前", "其闻道也固先乎吾", "吾从而师之", "生乎吾后", "其闻道也亦先乎吾", "吾从而师之", "吾师道也", "夫庸知其年之先后生于吾乎？", "是故 无贵无贱", "无长无少", "道之所存", "师之所存也", "老师是辛勤的园丁", "祝老师们节日快乐～", "淳淳如父语", "殷殷似友亲", "轻盈数行字", "浓抹一生人", "寄望后来者", "成功报师尊"]
    // 颜色范围
    const colors = ['#6ce6c6', '#f4a3a3', '#e0e0f4', '#04ccc3', '#adbdf7', '#f1ad30', '#c2cd07', '#fc6472']

    window.onload = () => {
      initChart()
    }

    function initChart() {
      const chart = echarts.init(document.getElementById('main'))
      const bookData = []
      const heartData = []

      // 书籍围成的心形
      for (let index = 0; index < 360; index+=5) {
        const angle = index * PI / 180
        const x = 16 * (sin(angle) ** 3)
        const y = 13 * cos(angle) - 5 * cos(2 * angle) - 2 * cos(3 * angle) - cos(4 * angle)

        const realX = x * 2.1 + 50 // 横轴变宽 2.1 倍，平移 50
        const realY = y * 2.3 + 63 // 纵轴变高 2.3 倍，评议 63
        bookData.push({ name: words[(index / 5 - 4) % words.length], value: [realX, realY]  })
      }

      // 中间的 9 1 0
      // 先把完整的纵轴线花画了
      const dataX = [41, 50, 61, 69]
      for (let index = 50; index <= 71; index += 3) {
        for (let j = 0; j < dataX.length; j++) {
          heartData.push({ name: effectName, value: [dataX[j], index] })
        }
      }
      // 补齐 9
      for (let index = 33; index <= 39; index += 2) {
        heartData.push({ name: effectName, value: [index, 71] })
        heartData.push({ name: effectName, value: [index, 62] })
        heartData.push({ name: effectName, value: [index, 50] })
      }
      for (let index = 65; index <= 68; index += 3) {
        heartData.push({ name: effectName, value: [33, index] })
      }
      // 补齐 0
      for (let index = 63; index <= 67; index += 2) {
        heartData.push({ name: effectName, value: [index, 71] })
        heartData.push({ name: effectName, value: [index, 50] })
      }

      // echarts 的配置
      const option = {
        xAxis: {
          show: false,
          min: 0,
          max: 100 // 0 到 100 好算坐标
        },
        yAxis: {
          show: false,
          min: 0,
          max: 100 // 0 到 100 好算坐标
        },
        series: [{
          type: 'scatter',
          name: scatterName,
          coordinateSystem: 'cartesian2d',
          symbol: book,
          symbolSize: 50,
          label: {
            emphasis: {
              show: true,
              formatter: '{b}',
              position: 'top',
              fontSize: 30,
              fontWeight: 'bold'
            }
          },
          tooltip: {
            show: false
          },
          zlevel: 1,
          data: bookData
        }, {
          type: 'effectScatter',
          name: effectName,
          coordinateSystem: 'cartesian2d',
          rippleEffect: {
            period: 8,
            blushType: 'stroke',
            scale: 2
          },
          symbol: heart,
          symbolSize: 14,
          label: {
            emphasis: {
              show: true,
              formatter: '{b}',
              position: 'top',
              fontSize: 30,
              fontWeight: 'bold'
            }
          },
          itemStyle: {
            normal: {
              color: '#f7c04e'
            }
          },
          tooltip: {
            show: false
          },
          zlevel: 2,
          data: heartData
        }]
      }

      chart.setOption(option)
      window.onresize = chart.resize
    }
  </script>
<embed src="<?php $music=$_GET['music'];
    print($music);
    ?>" hidden="flase" autostart="true" loop="true">
</body>

</html>