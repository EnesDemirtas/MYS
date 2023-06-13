<tr>
    <th scope="row">{{ $soru }}</th>
    <td><input type="radio" name="soru_{{ $key + 1 }}" value="uygun"
            {{ old('soru_' . $key + 1) == 'uygun' ? 'checked' : '' }}></td>
    <td><input type="radio" name="soru_{{ $key + 1 }}" value="uygun_degil"
            {{ old('soru_' . $key + 1) == 'uygun_degil' ? 'checked' : '' }}></td>
    <td><input type="radio" name="soru_{{ $key + 1 }}" value="onarildi"
            {{ old('soru_' . $key + 1) == 'onarildi' ? 'checked' : '' }}></td>
    <td><input type="radio" name="soru_{{ $key + 1 }}" value="yenilendi"
            {{ old('soru_' . $key + 1) == 'yenilendi' ? 'checked' : '' }}></td>
    <td>
        <textarea type="textarea" id="aciklamalar"></textarea>
    </td>
</tr>
