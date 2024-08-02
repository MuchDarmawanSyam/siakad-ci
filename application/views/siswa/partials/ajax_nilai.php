<?php if (!empty($nilai)): ?>
    <?php $no = 1; ?>
    <?php foreach ($nilai as $ni): ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $ni->nama_mapel; ?></td>
            <td><?php echo $ni->nama_guru; ?></td>
            <td><?php echo $ni->kkm; ?></td>
            <td><?php echo $ni->rata1; ?></td>
            <td><?php echo $ni->predikat; ?></td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="5" class="text-center">Tidak ada nilai di kelas dan semester ini.</td>
    </tr>
<?php endif; ?>