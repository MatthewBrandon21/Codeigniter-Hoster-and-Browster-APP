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
            $html='<h3>Invoice Browster</h3>';
            foreach ($pinjam as $b) 
            {
                $html.='
                    <h4>Tanggal Transaksi: </h4>
                '.$b->pinjam_tgltransaksi.'
                    </br>
                    <h4>Kode Pinjam: </h4>
                '.$b->pinjam_id.'
                    </br>
                    <h4>Nama Peminjam: </h4>
                '.$b->user_nama.'
                    </br>
                    <h4>Email Peminjam: </h4>
                '.$b->user_email.'
                    </br>
                    <h4>Barang yang dipinjam</h4>
                '.$b->barang_nama.'
                    </br>
                    <h4>Jumlah Hari: </h4>
                '.$b->pinjam_hari.' hari
                    </br>
                    <h4>Total Harga: </h4>
                Rp. '.number_format($b->pinjam_harga).'
                '
                ;
            }
            $html.= '<H1>Silahkan tunjukan invoice ini ke kurir yang mengantar barang</H1>';
            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->Output('invoice.pdf', 'I');
?>