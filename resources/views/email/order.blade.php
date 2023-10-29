<h2>Xin chào {{ $c_name }}</h2>
<p>
    <b>Delicious xin cảm ơn quý khách!!! Bạn đã đặt hàng thành công tại cửa hàng của chúng tôi</b>
</p>
<h4>Thông tin đơn hàng của bạn</h4>
<h4>Mã đơn hàng: {{$order->id}}</h4>
<h4>Ngày đặt hàng: {{$order->created_at}}</h4>

<h4>Chi tiết sản phẩm</h4>
<table border="1" cellspacing="0" cellpadding="0" width="400">
    <thead>
        <tr>
            <th style="width:1%">STT</th>
            <th style="width:40%">Tên sản phẩm</th>
            <th style="width:20%">Giá</th>
            <th style="width:19%">Số lượng</th>
            <th style="width:20%">Tổng Tiền</th>
        </tr>
    </thead>
    <tbody>
        <?php $n = 1;?>
        @foreach($items as  $item)
        <tr>
            <td>{{$n}}</td>
            <td>{{ $item['product_name'] }}</td>
            <td>{{ number_format($item['price'],0,',','.') }} VND</td>
            <td> {{ $item['quantity'] }}</td>
            <td>{{ number_format($item['price']*$item['quantity'],0,',','.') }} VND</td>
        </tr>
        <?php $n++?>
        @endforeach
    </tbody>
</table>
<h4>Tổng tiền phải trả: {{number_format($total,0,',','.')}} VND</h4>
<h3>Xin vui lòng chuẩn bị tiền trước khi nhận hàng!!! Chúc quý khách một ngày tốt lành</h3>