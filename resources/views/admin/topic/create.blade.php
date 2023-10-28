@extends('layouts.admin')

@section('title','POST|TravelMe')

@section('content')
<section class="section-inner">
  <h1 class="post-ttl">POST</h1>
  <form action="{{ route('admin.topic.create') }}" method="post" enctype="multipart/form-data">
    @if (count($errors) > 0)
    <ul>
        @foreach($errors->all() as $e)
            <li>{{ $e }}</li>
        @endforeach
    </ul>
    @endif
    <div class="post-wrap">
      <div class="left-container">
        <table class="post-table">
          <tr class="post-row">
            <th class="post-head">TITLE</th>
            <td class="post-data"><input type="text" class="form-control" name="title" value="{{ old('title') }}"></td>
          </tr>
          <tr class="post-row">
            <th class="post-head">LOCATION</th>
            <td class="post-data">
              <select name="location">
                <option value="Hokkaido">北海道</option>
                <option value="Aomori">青森県</option>
                <option value="Iwate">岩手県</option>
                <option value="Miyagi">宮城県</option>
                <option value="Akita">秋田県</option>
                <option value="Yamagata">山形県</option>
                <option value="Hukushima">福島県</option>
                <option value="Ibaraki">茨城県</option>
                <option value="Tochigi">栃木県</option>
                <option value="Gunma">群馬県</option>
                <option value="Saitama">埼玉県</option>
                <option value="Chiba">千葉県</option>
                <option value="Tokyo">東京都</option>
                <option value="Kanagawa">神奈川県</option>
                <option value="Niigata">新潟県</option>
                <option value="Toyama">富山県</option>
                <option value="Ishikawa">石川県</option>
                <option value="Fukui">福井県</option>
                <option value="Yamanashi">山梨県</option>
                <option value="Nagano">長野県</option>
                <option value="Gifu">岐阜県</option>
                <option value="Shizuoka">静岡県</option>
                <option value="Aichi">愛知県</option>
                <option value="Mie">三重県</option>
                <option value="Shiga">滋賀県</option>
                <option value="Kyoto">京都府</option>
                <option value="Osaka">大阪府</option>
                <option value="Hyogo">兵庫県</option>
                <option value="Nara">奈良県</option>
                <option value="Wakayama">和歌山県</option>
                <option value="Tottori">鳥取県</option>
                <option value="Okayama">岡山県</option>
                <option value="Hiroshima">広島県</option>
                <option value="Yamaguchi">山口県</option>
                <option value="Tokushima">徳島県</option>
                <option value="Kagawa">香川県</option>
                <option value="Ehime">愛媛県</option>
                <option value="Kochi">高知県</option>
                <option value="Fukuoka">福岡県</option>
                <option value="Saga">佐賀県</option>
                <option value="Nagasaki">長崎県</option>
                <option value="Kumamoto">熊本県</option>
                <option value="Oita">大分県</option>
                <option value="Miyazaki">宮崎県</option>
                <option value="Kagoshima">鹿児島県</option>
                <option value="Okinawa">沖縄県</option>
              </select>
            </td>
          </tr>
          <tr class="post-row">
            <th class="post-head">GENRE</th>
              <td class="post-data">
                <div class="genre">
                  <input type="checkbox" id="spot" name="genre[]" value="{{ old('spot') }}">
                  <label for="spot">Spot</label>
                </div>
                <div class="genre">
                  <input type="checkbox" id="accommodation" name="genre[]" value="{{ old('accommodation') }}">
                  <label for="accommodation">Accom</label>
                </div>
                <div class="genre">
                  <input type="checkbox" id="restaurant" name="genre[]" value="{{ old('restaurant') }}">
                  <label for="restaurant">Restaurant</label>
                </div>
                <div class="genre">
                  <input type="checkbox" id="shope" name="genre[]" value="{{ old('shop') }}">
                  <label for="shop">Shop</label>
                </div>
            </td>
          </tr>
          <tr class="post-row">
            <th class="post-head">BODY</th>
            <td class="post-data">
              <textarea name="body" rows="20">{{ old('body') }}</textarea>
            </td>
          </tr>
        </table>
      </div>  
      <div class="right-container">
        <table class="post-table">
          <tr class="post-row">
            <th class="post-head">Picture</th>
            <td class="post-data">
              <input type="file" name="image">
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="post-btn">
        @csrf
        <input type="submit" value="POST">
    </div>
  </form>
</section>
@endsection