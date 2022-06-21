<?php
            $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->SetTitle('Daftar Produk');
            $pdf->SetHeaderMargin(30);
            $pdf->SetTopMargin(20);
            $pdf->setFooterMargin(20);
            $pdf->SetAutoPageBreak(true);
            $pdf->SetAuthor('Author');
            $pdf->SetDisplayMode('real', 'default');
            $pdf->AddPage();
            $i=0;
            $html='<h3>Invoice Hoster</h3>';
            foreach ($booking as $b) 
            {
                $masuk  = strtotime($b->booking_tglcheckin);
                $keluar   = strtotime($b->booking_tglcheckout);
                $jmlhari        = abs(($masuk - $keluar)/(60*60*24));
                $html.='
                    <h4>Tanggal Transaksi: </h4>
                '.$b->booking_tgltransaksi.'
                    </br>
                    <h4>Kode Booking: </h4>
                '.$b->booking_id.'
                    </br>
                    <h4>Nama Tamu: </h4>
                '.$b->booking_nama.'
                    </br>
                    <h4>Nomor HP: </h4>
                '.$b->booking_hp.'
                    </br>
                    <h4>Email: </h4>
                '.$b->booking_email.'
                    </br>
                    <h4>Nama Nama Hotel: </h4>
                '.$b->hotel_nama.'
                    </br>
                    <h4>Nama Tanggal Checkin: </h4>
                '.$b->booking_tglcheckin.'
                    </br>
                    <h4>Tanggal Checkout: </h4>
                '.$b->booking_tglcheckout.'
                    </br>
                    <h4>Nama Jumlah Hari: </h4>
                '.$jmlhari.' hari
                    </br>
                    <h4>Nama Jumlah Kamar: </h4>
                '.$b->booking_jmlkamar.' kamar
                    </br>
                    <h4>Total Harga: </h4>
                Rp. '.number_format($b->booking_harga).'
                '
                ;
            }
            $html.= '<H1>Silahkan tunjukan invoice ini ke lobby hotel</H1>';
            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->Output('invoice.pdf', 'I');
?>