<?php
// 以下配列の中身をfor文を使用して表示してください。
// 表が縦横に伸びてもある程度対応できるように柔軟な作りを目指してください。
// 表示はHTMLの<table>タグを使用すること

/**
 * 表示イメージ
 *  _________________________
 *  |_____|_c1|_c2|_c3|横合計|
 *  |___r1|_10|__5|_20|___35|
 *  |___r2|__7|__8|_12|___27|
 *  |___r3|_25|__9|130|__164|
 *  |縦合計|_42|_22|162|__226|
 *  ‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾‾
 */

$arr = [
    'r1' => ['c1' => 10, 'c2' => 5, 'c3' => 20],
    'r2' => ['c1' => 7, 'c2' => 8, 'c3' => 12],
    'r3' => ['c1' => 25, 'c2' => 9, 'c3' => 130]
];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>テーブル表示</title>
<style>
table {
    border:1px solid #000;
    border-collapse: collapse;
}
th, td {
    border:1px solid #000;
}
</style>
</head>
<body>
<table>
        <tr>
            <th></th>
            <?php foreach ($arr['r1'] as $key => $value): ?>
                <th><?= $key ?></th>
            <?php endforeach; ?>
            <th>横合計</th>
        </tr>

        <?php foreach ($arr as $rowKey => $rowData): ?>
            <tr>
                <th><?= $rowKey ?></th>
                <?php $rowSum = 0; ?>
                <?php foreach ($rowData as $colKey => $colData): ?>
                    <td><?= $colData ?></td>
                    <?php $rowSum += $colData; ?>
                <?php endforeach; ?>
                <td><?= $rowSum ?></td>
            </tr>
        <?php endforeach; ?>

        <tr>
            <th>縦合計</th>
            <?php $colSum = ['c1' => 0, 'c2' => 0, 'c3' => 0]; ?>
            <?php foreach ($arr as $rowData): ?>
                <?php foreach ($rowData as $colKey => $colData): ?>
                    <?php $colSum[$colKey] += $colData; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>

            <?php foreach ($colSum as $colData): ?>
                <td><?= $colData ?></td>
            <?php endforeach; ?>
            <td><?= array_sum($colSum) ?></td>
        </tr>
    </table>
</body>
</html>