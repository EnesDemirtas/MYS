<tr>
    <td>{{ $data['kontrol'] }}</td>
    <td><input type="checkbox" name="uygun" id="uygun" @checked($data == 'uygun')></td>
    <td><input type="checkbox" name="uygun_degil" id="uygun_degil" @checked($data == 'uygun_degil')></td>
    <td><input type="checkbox" name="onarildi" id="onarildi" @checked($data == 'onarildi')></td>
    <td><input type="checkbox" name="yenilendi" id="yenilendi" @checked($data == 'yenilendi')></td>
    <td>
        <textarea type="textarea" name="aciklamalar" id="aciklamalar"></textarea>
    </td>
</tr>
