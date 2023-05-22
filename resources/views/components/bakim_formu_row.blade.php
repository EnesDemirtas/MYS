<tr>
    <td>{{ $data['kontrol'] }}</td>
    <td><input type="checkbox" name="uygun" id="uygun" @checked($data['durum'] == 'uygun')></td>
    <td><input type="checkbox" name="uygun_degil" id="uygun_degil" @checked($data['durum'] == 'uygun_degil')></td>
    <td><input type="checkbox" name="onarildi" id="onarildi" @checked($data['durum'] == 'onarildi')></td>
    <td><input type="checkbox" name="yenilendi" id="yenilendi" @checked($data['durum'] == 'yenilendi')></td>
    <td>
        <textarea type="textarea" name="aciklamalar" id="aciklamalar">{{ $data['aciklama'] }}</textarea>
    </td>
</tr>
