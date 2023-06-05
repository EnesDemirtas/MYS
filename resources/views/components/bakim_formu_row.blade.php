<tr>
    <th scope="row">{{ $soru }}</th>
    <td><input type="radio" name="soru_{{ $key + 1 }}" value="uygun"></td>
    <td><input type="radio" name="soru_{{ $key + 1 }}" value="uygun_degil"></td>
    <td><input type="radio" name="soru_{{ $key + 1 }}" value="onarildi"></td>
    <td><input type="radio" name="soru_{{ $key + 1 }}" value="yenilendi"></td>
    <td>
        <textarea type="textarea" id="aciklamalar"></textarea>
    </td>
</tr>
