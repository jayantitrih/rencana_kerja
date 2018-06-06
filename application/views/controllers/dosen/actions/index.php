<table class="table datatables">
          <thead>
            <tr>
              <th>No</th>
              <th>NIDN</th>
              <th>Nama Lengkap</th>
              <th>Pengajaran</th>
              <th>Penelitian</th>
              <th>Pengabdian</th>
              <th>Penunjang</th>
              <th>Kesimpulan</th>
              <th>Konfirmasi</th>
      
            
            </tr>
          </thead>
          <tbody>
            <?php
              if (isset($identitas)) {
                $no = 1;
                foreach ($identitas as $key => $value) {
                $jml_pengajaran = get_jumlah_sks_pengajaran($value['id_identitas']);
                $jml_penelitian = get_jumlah_sks_penelitian($value['id_identitas']);
                $jml_pengabdian = get_jumlah_sks_pengabdian($value['id_identitas']);
                $jml_penunjang = get_jumlah_sks_penunjang($value['id_identitas']);
                ?>
                <tr>
                  <td><?php echo $no;?> </td>
                  <td><?php echo $value['NIDN'];?></td>
                  <td><?php echo $value['Nama'];?></td>
                  <td>
                    <?=$jml_pengajaran;?>
                  </td>
                  <td>
                    <?=$jml_penelitian;?>
                  </td>
                  <td>
                    <?=$jml_pengabdian;?>
                  </td>
                  <td>
                    <?=$jml_penunjang;?>
                  </td>
                  <td>
                    <?php
                      $total = $jml_pengajaran+$jml_penelitian+$jml_pengabdian+$jml_penunjang
                      ;
                      if ($total >= 12 && $total <= 16) {
                        echo "Memenuhi";
                      }else{
                        echo "Tidak Memenuhi";
                      }
                      
                      //echo $total;
                    ;?>
                        
                  </td>
                   <td>
                    <?php
                      $total = $jml_pengajaran+$jml_penelitian+$jml_pengabdian+$jml_penunjang
                      ;
                      if ($total >= 12 && $total <= 16) {
                        echo anchor('/', 'Konfirmasi', array('class'=>'btn btn-primary'));
                      }
                      //echo $total;
                    ;?>
                        
                  </td>
                </tr>
            <?php 
                  $no++;
                }
              }
            ?>
          </tbody>
        </table>
