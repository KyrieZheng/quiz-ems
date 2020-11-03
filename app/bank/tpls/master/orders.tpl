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
                            <li><a href="index.php?{x2;$_app}-master">{x2;$apps[$_app]['appname']}</a></li>
                            <li class="active">订单列表</li>
                        </ol>
                    </div>
                </div>
                <div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
                    <h4 class="title" style="padding:10px;">
                        订单列表
                    </h4>
                    <form action="index.php?bank-master-orders-batremove" method="post">
                        <fieldset>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr class="info">
                                        <th><input type="checkbox" class="checkall" target="delids"/></th>
                                        <th>订单号</th>
                                        <th>订单客户</th>
                                        <th>充值金额</th>
                                        <th>下单时间</th>
                                        <th>订单状态</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {x2;tree:$orders['data'],order,oid}
                                    <tr>
                                        <td><input type="checkbox" name="delids[{x2;v:order['ordersn']}]" value="1"></td>
                                        <td>{x2;v:order['ordersn']}</td>
                                        <td>{x2;v:order['orderuserinfo']['username']}</td>
                                        <td>{x2;v:order['orderprice']}</td>
                                        <td>{x2;date:v:order['ordercreatetime'],'Y-m-d'}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" data-toggle="dropdown">{x2;$orderstatus[v:order['orderstatus']]}<strong class="caret"></strong></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="javascript:;">更改状态</a></li>
                                                    <li class="divider"></li>
                                                    {x2;tree:$orderstatus,os,oid}
                                                    {x2;if:v:key > v:order['orderstatus']}
                                                    <li><a class="ajax" href="index.php?{x2;$_app}-master-orders-change&ordersn={x2;v:order['ordersn']}&orderstatus={x2;v:key}&page={x2;$page}">{x2;v:os}</a></li>
                                                    {x2;endif}
                                                    {x2;endtree}
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn confirm" href="index.php?{x2;$_app}-master-orders-remove&ordersn={x2;v:order['ordersn']}&page={x2;$page}{x2;$u}" title="删除订单"><em class="glyphicon glyphicon-remove"></em></a>
                                            </div>
                                        </td>
                                    </tr>
                                    {x2;endtree}
                                </tbody>
                            </table>
                            <div class="form-group">
                                <div class="controls">
                                    <label class="radio-inline">
                                        <input type="radio" name="action" value="delete" checked/>删除
                                    </label>
                                    {x2;if:is_array($search)}{x2;tree:$search,arg,sid}
                                    <input type="hidden" name="search[{x2;v:key}]" value="{x2;v:arg}"/>
                                    {x2;endtree}{x2;endif}
                                    <label class="radio-inline">
                                        <button class="btn btn-primary" type="submit">提交</button>
                                    </label>
                                    <input type="hidden" name="page" value="{x2;$page}"/>
                                </div>
                            </div>
                            <ul class="pagination pull-right">
                                {x2;$orders['pages']}
                            </ul>
                        </fieldset>
                    </form>
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
