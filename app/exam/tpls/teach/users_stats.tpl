{x2;if:!$userhash}
{x2;include:header}
<body>
{x2;include:nav}
<div class="container-fluid">
    <div class="row-fluid">
        <div class="main">
            <div class="col-xs-2 leftmenu">
                {x2;include:menu}
            </div>
            <div id="datacontent">
{x2;endif}
                <div class="box itembox" style="margin-bottom:0px;border-bottom:1px solid #CCCCCC;">
                    <div class="col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="index.php?{x2;$_app}-teach">{x2;$apps[$_app]['appname']}</a></li>
                            <li><a href="index.php?{x2;$_app}-teach-users">课程成绩</a></li>
                            <li class="active">成绩分析</li>
                        </ol>
                    </div>
                </div>
                <div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
                    <h4 class="title" style="padding:10px;">
                        试题正确率分析
                        <a class="pull-right btn btn-primary" href="index.php?exam-teach-users-stats&basicid={x2;$basicid}{x2;$u}&type=1">知识点正确率分析</a></a>
                    </h4>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr class="info">
                                <th>ID</th>
                                <th width="50%">试题名称</th>
                                <th>A</th>
                                <th>B</th>
                                <th>C</th>
                                <th>D</th>
                                <th>正确次数</th>
                                <th>出现次数</th>
                                <th>正确率</th>
                            </tr>
                        </thead>
                        <tbody>
                            {x2;tree:$stats['data'],stat,sid}
                            <tr>
                                <td>
                                    {x2;v:stat['id']}
                                </td>
                                <td>
                                    {x2;realhtml:v:stat['title']}
                                </td>
                                <td>
                                    {x2;eval: echo round(100 * v:stat['A']/v:stat['number'],2)}%
                                </td>
                                <td>
                                    {x2;eval: echo round(100 * v:stat['B']/v:stat['number'],2)}%
                                </td>
                                <td>
                                    {x2;eval: echo round(100 * v:stat['C']/v:stat['number'],2)}%
                                </td>
                                <td>
                                    {x2;eval: echo round(100 * v:stat['D']/v:stat['number'],2)}%
                                </td>
                                <td>
                                    {x2;eval: echo intval(v:stat['right'])}
                                </td>
                                <td>
                                    {x2;v:stat['number']}
                                </td>
                                <td>
                                    {x2;eval: echo round(100 * v:stat['right']/v:stat['number'],2)}%
                                </td>
                            </tr>
                            {x2;endtree}
                        </tbody>
                    </table>
                    <ul class="pagination pull-right">
                        {x2;$stats['pages']}
                    </ul>
                </div>
            </div>
{x2;if:!$userhash}
        </div>
    </div>
</div>
{x2;include:footer}
</body>
</html>
{x2;endif}
