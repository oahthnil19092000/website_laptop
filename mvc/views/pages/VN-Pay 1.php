<div class='container'>
    <div class='window1'>
        <div class='order-info'>
            <div class='order-info-content'>
                <h1>Thanh toán VN-PAY</h1>

                <div class='credit-info'>
                    <div class='credit-info-content'>
                        <div class="table-responsive">
                            <form action="home/vnpay_create_payment" id="create_form" method="post">

                                <div class="form-group">
                                    <select name="order_type" id="order_type" class="form-control" hidden>
                                        <option value="billpayment">Thanh toán hóa đơn</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="order_id" name="order_id" type="text"
                                        value="<?= $data['order'] ?>" hidden />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="amount" name="amount" type="number"
                                        value="<?= $data['money']; ?>" hidden />
                                </div>
                                <div class="form-group">
                                    <b>Ngân hàng:</b>
                                    <select name="bank_code" id="bank_code" class="form-control">
                                        <option value="">Chọn ngân hàng</option>
                                        <option value="NCB"> Ngân hàng NCB</option>
                                        <option value="AGRIBANK"> Ngân hàng Agribank</option>
                                        <option value="SCB"> Ngân hàng SCB</option>
                                        <option value="SACOMBANK">Ngân hàng SacomBank</option>
                                        <option value="EXIMBANK"> Ngân hàng EximBank</option>
                                        <option value="MSBANK"> Ngân hàng MSBANK</option>
                                        <option value="NAMABANK"> Ngân hàng NamABank</option>
                                        <option value="VNMART"> Vi dien tu VnMart</option>
                                        <option value="VIETINBANK">Ngân hàng Vietinbank</option>
                                        <option value="VIETCOMBANK"> Ngân hàng VCB</option>
                                        <option value="HDBANK">Ngân hàng HDBank</option>
                                        <option value="DONGABANK"> Ngân hàng Dong A</option>
                                        <option value="TPBANK"> Ngân hàng TPBank</option>
                                        <option value="OJB"> Ngân hàng OceanBank</option>
                                        <option value="BIDV"> Ngân hàng BIDV</option>
                                        <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                                        <option value="VPBANK"> Ngân hàng VPBank</option>
                                        <option value="MBBANK"> Ngân hàng MBBank</option>
                                        <option value="ACB"> Ngân hàng ACB</option>
                                        <option value="OCB"> Ngân hàng OCB</option>
                                        <option value="IVB"> Ngân hàng IVB</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <b>Ghi chú:</b>
                                    <textarea class="form-control" cols="33" id="order_desc" name="order_desc" rows="10"
                                        placeholder="Ghi chú">Ghi chú</textarea>
                                </div>
                                <div class="form-group">
                                    <select name="language" id="language" class="form-control" hidden>
                                        <option value="vn">Tiếng Việt</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn pay-btn">Thanh toán</button>

                            </form>
                        </div>

                    </div>
                </div>
            </div>