<tr>
    <td>{{ $soru }}</td>
    <td><input type="radio" name="soru_{{ $key + 1 }}" id="uygun" value="uygun"></td>
    <td><input type="radio" name="soru_{{ $key + 1 }}" id="uygun_degil" value="uygun_degil"></td>
    <td><input type="radio" name="soru_{{ $key + 1 }}" id="onarildi" value="onarildi"></td>
    <td><input type="radio" name="soru_{{ $key + 1 }}" id="yenilendi" value="yenilendi"></td>
    <td>
        <textarea type="textarea" name="aciklama_{{ $key + 1 }}" id="aciklamalar"></textarea>
    </td>
</tr>
