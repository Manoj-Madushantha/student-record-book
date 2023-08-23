<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__) ?>css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <style>
        table tr td{
            
            border: 1px solid black;
            padding: 5px;
            font-size: 15px;
        }
        th{
            background-color: dimgray;
            color: aliceblue;
        }

        tr:hover {
            background-color: rgb(62, 161, 48);
            color: azure;
            font-weight: bold;
        }
    </style>
    <script type="text/javascript">
        $(function() {
            $('input:number:first').focus();
            var $inp = $('input:number');
            $inp.bind('keydown', function(e) {
                //var key = (e.keyCode ? e.keyCode : e.charCode);
                var key = e.which;
                if (key == 13) {
                    e.preventDefault();
                    var nxtIdx = $inp.index(this) + 1;
                    $(":input:number:eq(" + nxtIdx + ")").focus();
                }
            });
        });
    </script>
    <title>Teacher Login</title>
</head>
<body>
    <div class="tabs-container">
        <ul class="tabs">
          <li class="active">
            <a href="">Part 1</a>
          </li>
          <li>
            <a href="">11 D - Science</a>
          </li>
          <li>
            <a href="">11G - Science</a>
          </li>
        </ul>
        <div class="tabs-content">
          <div class="tabs-panel active" data-index="0">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra erat at dui dictum, ac semper ante blandit. Suspendisse eleifend felis augue, et egestas odio tempor sed. Quisque sed justo eget arcu viverra sodales. Suspendisse a venenatis
              augue, imperdiet elementum lorem. Donec neque dui, fringilla vitae ultricies vel, scelerisque non ante. Aliquam erat volutpat. Donec erat velit, finibus at lobortis nec, venenatis ac ipsum. Proin blandit urna turpis, quis euismod dui elementum
              quis. Vestibulum hendrerit eget est ornare sollicitudin. Cras sit amet mi ut dui venenatis maximus. Donec blandit libero risus, non cursus mauris dignissim a. Donec vitae risus condimentum, rhoncus nibh in, scelerisque massa. Vivamus semper laoreet
              neque at molestie. Integer nulla nisl, accumsan convallis bibendum ac, suscipit ac leo. Nunc at odio interdum, interdum arcu eu, ullamcorper felis.</p>
            <div style="position:relative;height:0;padding-bottom:56.21%"><iframe width="560" height="315" src="https://www.youtube.com/embed/sUI-XUD6WUY" style="position:absolute;width:100%;height:100%;left:0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>
          </div>
          <div class="tabs-panel" data-index="1">
            <h2>First Term Test - 2023</h2>
            <h3>Science</h3>
            <p>
                Teacher : P.D.P.G. Douglus
            </p>
            <br><br>
            <table>
                <tr>
                    <th>Index</th>
                    <th>Student Name</th>
                    <th>Marks</th>
                </tr>
                <tr>
                    <td>6733</td>
                    <td>A. Vidusha Navod</td>
                    <td><input type="number" pattern="[0-9]*" size="5"/></td>
                </tr>
                <tr>
                    <td>6796</td>
                    <td>Anup Chetha Kumarasinghe</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>6797</td>
                    <td>A. Madusha Kalhara</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>6900</td>
                    <td>W.P. Imandive Wikramanayake</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>6932</td>
                    <td>M.G. Thinuga Dimandith</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>6988</td>
                    <td>Yewan Mevindu</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>6991</td>
                    <td>U.K. Sanuka Sipsara</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>7003</td>
                    <td>Umesh Dilshan</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>7032</td>
                    <td>W.L.S.P. Janasinghe</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>7125</td>
                    <td>H.D. Sasiru Savinda</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>7165</td>
                    <td>M.A. Pamindu Mandiv</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>7168</td>
                    <td>G.H. Sadew Theekshana</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>7177</td>
                    <td>Gagana Suvipul </td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>7236</td>
                    <td>J.W.G. Lithum Heesara</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>7240</td>
                    <td>M.Visal Wathsuka</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>7247</td>
                    <td>K.R. Dimasha Gayanuka </td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>7251</td>
                    <td>S.Tharush Hussain</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>7282</td>
                    <td>A.O. Mallikaracchi</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>7316</td>
                    <td>D.L.A.Shenilka Liyanage</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>7362</td>
                    <td>G.W. Yasindu Nimsara</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>7389</td>
                    <td>M.K.S.Malithu Minijaya</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>7563</td>
                    <td>Imash Arosha Melvin</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>7582</td>
                    <td>R.A.Warsha Rasanjana </td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>7584</td>
                    <td>W.G.Yasith Nimsara</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>8749</td>
                    <td>J.A. Kenul Kithmaka</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>9508</td>
                    <td>L.Thimasha Dewmina</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>10722</td>
                    <td>M.W. Sanula Methwan</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>6771</td>
                    <td>Y.Prabhavi Preksha</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>6799</td>
                    <td>M.A.Sewmini Thathsarani</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>6931</td>
                    <td>J.Ganeesha Gimhani</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>6942</td>
                    <td>A.W.Isuri Keshani</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>6961</td>
                    <td>H.M.Tishara Kaumadi</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>6968</td>
                    <td>A.M Sadewmi Akarsha</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>6989</td>
                    <td>N.A.Sadithma Sathsarani</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>7046</td>
                    <td>W.D.S.N.Minduli Bandara</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>7054</td>
                    <td>J.A.D.Umanda Dushmanda</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>7140</td>
                    <td>Aveesha Ranruwani</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>7269</td>
                    <td>M.Lithumini Aknara</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>7298</td>
                    <td>Binuthi Thehana</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>7372</td>
                    <td>R.M.Lakshi Imalka</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>7378</td>
                    <td>Hansani Sarala</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>7503</td>
                    <td>K.G.Bhagya Sewwandi </td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>7518</td>
                    <td>Chamudi Dananjana</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>7519</td>
                    <td>D.T.Tharushi Thehasna</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>8767</td>
                    <td>H.R.Sithmi Sadithma</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>6751</td>
                    <td>Sethumi Yahanma Senadeera</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>7388</td>
                    <td>W.H.Nethmi Yeshara</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td>8554</td>
                    <td>Lasitha Medhani</td>
                    <td><input type="number" pattern="[0-9]*" size="10"/></td>
                </tr>
                <tr>
                    <td><input type="submit" value="ADD"></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
          </div>
          <div class="tabs-panel" data-index="2">
            <p>Mauris id justo accumsan, semper metus non, aliquam purus. Mauris nunc libero, dignissim sit amet est in, egestas molestie nunc. Mauris gravida vel tellus sit amet consequat. Maecenas malesuada varius nibh, vel feugiat enim convallis vitae. Suspendisse
              et pharetra velit. Vestibulum in ex est. Vestibulum tempor interdum metus et malesuada. Nullam ornare mi elit, id scelerisque ante dictum in. Nullam id mauris erat. Nunc non imperdiet dui. Ut pellentesque ultrices tincidunt. Nulla ac diam id dolor
              semper malesuada nec eu massa. Nam tortor magna, luctus a blandit vitae, aliquam et arcu. Aenean non vestibulum leo, in pellentesque odio.</p>
          </div>
        </div>
      </div>
      <script src="<?php echo plugin_dir_url(__FILE__) ?>js/script.js"></script>
</body>
</html>