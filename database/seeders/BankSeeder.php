<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banks = [
            [
                "code" => "ABBANK",
                "name" => "Ngân hàng thương mại cổ phần An Bình (ABBANK)",
                "avatar" => "/images/bank/abbank_logo.png",
            ],
            [
                "code" => "ACB",
                "name" => "Ngân hàng ACB",
                "avatar" => "/images/bank/acb_logo.png",
            ],
            [
                "code" => "AGRIBANK",
                "name" => "Ngân hàng Nông nghiệp (Agribank)",
                "avatar" => "/images/bank/agribank_logo.png",
            ],
            [
                "code" => "BACABANK",
                "name" => "Ngân Hàng TMCP Bắc Á",
                "avatar" => "/images/bank/bacabank_logo.png",
            ],
            [
                "code" => "BIDV",
                "name" => "Ngân hàng đầu tư và phát triển Việt Nam (BIDV)",
                "avatar" => "/images/bank/bidv_logo.png",
            ],
            [
                "code" => "DONGABANK",
                "name" => "Ngân hàng Đông Á (DongABank)",
                "avatar" => "/images/bank/dongabank_logo.png",
            ],
            [
                "code" => "EXIMBANK",
                "name" => "Ngân hàng EximBank",
                "avatar" => "/images/bank/eximbank_logo.png",
            ],
            [
                "code" => "HDBANK",
                "name" => "Ngan hàng HDBank",
                "avatar" => "/images/bank/hdbank_logo.png",
            ],
            [
                "code" => "IVB",
                "name" => "Ngân hàng TNHH Indovina (IVB)",
                "avatar" => "/images/bank/ivb_logo.png",
            ],
            [
                "code" => "MBBANK",
                "name" => "Ngân hàng thương mại cổ phần Quân đội",
                "avatar" => "/images/bank/mbbank_logo.png",
            ],
            [
                "code" => "MSBANK",
                "name" => "Ngân hàng Hàng Hải (MSBANK)",
                "avatar" => "/images/bank/msbank_logo.png",
            ],
            [
                "code" => "NAMABANK",
                "name" => "Ngân hàng Nam Á (NamABank)",
                "avatar" => "/images/bank/namabank_logo.png",
            ],
            [
                "code" => "NCB",
                "name" => "Ngân hàng Quốc dân (NCB)",
                "avatar" => "/images/bank/ncb_logo.png",
            ],
            [
                "code" => "OCB",
                "name" => "Ngân hàng Phương Đông (OCB)",
                "avatar" => "/images/bank/ocb_logo.png",
            ],
            [
                "code" => "OJB",
                "name" => "Ngân hàng Đại Dương (OceanBank)",
                "avatar" => "/images/bank/ojb_logo.png",
            ],
            [
                "code" => "PVCOMBANK",
                "name" => "Ngân hàng TMCP Đại Chúng Việt Nam",
                "avatar" => "/images/bank/PVComBank_logo.png",
            ],
            [
                "code" => "SACOMBANK",
                "name" => "Ngân hàng TMCP Sài Gòn Thương Tín (SacomBank)",
                "avatar" => "/images/bank/sacombank_logo.png",
            ],
            [
                "code" => "SAIGONBANK",
                "name" => "Ngân hàng thương mại cổ phần Sài Gòn Công Thương",
                "avatar" => "/images/bank/saigonbank.png",
            ],
            [
                "code" => "SCB",
                "name" => "Ngân hàng TMCP Sài Gòn (SCB)",
                "avatar" => "/images/bank/scb_logo.png",
            ],
            [
                "code" => "SHB",
                "name" => "Ngân hàng Thương mại cổ phần Sài Gòn - Hà Nội(SHB)",
                "avatar" => "/images/bank/shb_logo.png",
            ],
            [
                "code" => "TECHCOMBANK",
                "name" => "Ngân hàng Kỹ thương Việt Nam (TechcomBank)",
                "avatar" => "/images/bank/techcombank_logo.png",
            ],
            [
                "code" => "TPBANK",
                "name" => "Ngân hàng Tiên Phong (TPBank)",
                "avatar" => "/images/bank/tpbank_logo.png",
            ],
            [
                "code" => "VPBANK",
                "name" => "Ngân hàng Việt Nam Thịnh vượng (VPBank)",
                "avatar" => "/images/bank/vpbank_logo.png",
            ],
            [
                "code" => "SEABANK",
                "name" => "Ngân Hàng TMCP Đông Nam Á",
                "avatar" => "/images/bank/seabank_logo.png",
            ],
            [
                "code" => "VIB",
                "name" => "Ngân hàng Thương mại cổ phần Quốc tế Việt Nam (VIB)",
                "avatar" => "/images/bank/vib_logo.png",
            ],
            [
                "code" => "VIETABANK",
                "name" => "Ngân hàng TMCP Việt Á",
                "avatar" => "/images/bank/vietabank_logo.png",
            ],
            [
                "code" => "VIETBANK",
                "name" => "Ngân hàng thương mại cổ phần Việt Nam Thương Tín",
                "avatar" => "/images/bank/vietbank_logo.png",
            ],
            [
                "code" => "VIETCAPITALBANK",
                "name" => "Ngân Hàng Bản Việt",
                "avatar" => "/images/bank/vccb_logo.png",
            ],
            [
                "code" => "VIETCOMBANK",
                "name" => "Ngân hàng Ngoại thương (Vietcombank)",
                "avatar" => "/images/bank/vietcombank_logo.png",
            ],
            [
                "code" => "VIETINBANK",
                "name" => "Ngân hàng Công thương (Vietinbank)",
                "avatar" => "/images/bank/vietinbank_logo.png",
            ],
            [
                "code" => "BIDC",
                "name" => "Ngân Hàng BIDC",
                "avatar" => "/images/bank/bidc_logo.png",
            ],
            [
                "code" => "LAOVIETBANK",
                "name" => "NGÂN HÀNG LIÊN DOANH LÀO - VIỆT",
                "avatar" => "/images/bank/laovietbank_logo.png",
            ],
            [
                "code" => "WOORIBANK",
                "name" => "Ngân hàng TNHH MTV Woori Việt Nam",
                "avatar" => "/images/bank/woori_logo.png",
            ],
            [
                "code" => "AMEX",
                "name" => "American Express",
                "avatar" => "/images/bank/amex_logo.png",
            ],
            [
                "code" => "VISA",
                "name" => "Thẻ quốc tế Visa",
                "avatar" => "/images/bank/visa_logo.png",
            ],
            [
                "code" => "MASTERCARD",
                "name" => "Thẻ quốc tế MasterCard",
                "avatar" => "/images/bank/mastercard_logo.png",
            ],
            [
                "code" => "JCB",
                "name" => "Thẻ quốc tế JCB",
                "avatar" => "/images/bank/jcb_logo.png",
            ],
            [
                "code" => "UPI",
                "name" => "UnionPay International",
                "avatar" => "/images/bank/upi_logo.png",
            ],
            [
                "code" => "VNMART",
                "name" => "Ví điện tử VnMart",
                "avatar" => "/images/bank/vnmart_logo.png",
            ],
            [
                "code" => "VNPAYQR",
                "name" => "Cổng thanh toán VNPAYQR",
                "avatar" => "/images/bank/CTT-VNPAY-QR.png",
            ],
            [
                "code" => "1PAY",
                "name" => "Ví điện tử 1Pay",
                "avatar" => "/images/bank/1pay_logo.png",
            ],
            [
                "code" => "FOXPAY",
                "name" => "Ví điện tử FOXPAY",
                "avatar" => "/images/bank/foxpay_logo.png",
            ],
            [
                "code" => "VIMASS",
                "name" => "Ví điện tử Vimass",
                "avatar" => "/images/bank/vimass_logo.png",
            ],
            [
                "code" => "VINID",
                "name" => "Ví điện tử VINID",
                "avatar" => "/images/bank/vinid_logo.png",
            ],
            [
                "code" => "VIVIET",
                "name" => "Ví điện tử Ví Việt",
                "avatar" => "/images/bank/viviet_logo.png",
            ],
            [
                "code" => "VNPTPAY",
                "name" => "Ví điện tử VNPTPAY",
                "avatar" => "/images/bank/vnptpay_logo.png",
            ],
            [
                "code" => "YOLO",
                "name" => "Ví điện tử YOLO",
                "avatar" => "/images/bank/yolo_logo.png",
            ],
            [
                "code" => "VIETCAPITALBANK",
                "name" => "Ngân Hàng Bản Việt",
                "avatar" => "/images/bank/vccb_logo.png",
            ],

        ];
        DB::table('banks')->insert($banks);
    }
}