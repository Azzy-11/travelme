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
                <option value="">===選択してください===</option>
                <option value="Hokkaido" @if("Hokkaido" === (int)old('location')) selected @endif>北海道</option>
                <option value="Aomori" @if("Aomori" === (int)old('location')) selected @endif>青森県</option>
                <option value="Iwate" @if("Iwate" === (int)old('location')) selected @endif>岩手県</option>
                <option value="Miyagi" @if("Miyagi" === (int)old('location')) selected @endif>宮城県</option>
                <option value="Akita" @if("Akita" === (int)old('location')) selected @endif>秋田県</option>
                <option value="Yamagata" @if("Yamagata" === (int)old('location')) selected @endif>山形県</option>
                <option value="Fukushima" @if("Fukushima" === (int)old('location')) selected @endif>福島県</option>
                <option value="Ibaraki" @if("Ibaraki" === (int)old('location')) selected @endif>茨城県</option>
                <option value="Tochigi" @if("Tochigi" === (int)old('location')) selected @endif>栃木県</option>
                <option value="Gunma" @if("Gunma" === (int)old('location')) selected @endif>群馬県</option>
                <option value="Saitama" @if("Saitama" === (int)old('location')) selected @endif>埼玉県</option>
                <option value="Chiba" @if("Chiba" === (int)old('location')) selected @endif>千葉県</option>
                <option value="Tokyo" @if("Tokyo" === (int)old('location')) selected @endif>東京都</option>
                <option value="Kanagawa" @if("Kanagawa" === (int)old('location')) selected @endif神奈川県</option>
                <option value="Niigata" @if("Niigata" === (int)old('location')) selected @endif>新潟県</option>
                <option value="Toyama" @if("Toyama" === (int)old('location')) selected @endif>富山県</option>
                <option value="Ishikawa" @if("Ishikawa" === (int)old('location')) selected @endif>石川県</option>
                <option value="Fukui" @if("Fukui" === (int)old('location')) selected @endif>福井県</option>
                <option value="Yamanashi" @if("Yamanashi" === (int)old('location')) selected @endif>山梨県</option>
                <option value="Nagano" @if("Nagano" === (int)old('location')) selected @endif>長野県</option>
                <option value="Gifu" @if("Gifu" === (int)old('location')) selected @endif>岐阜県</option>
                <option value="Shizuoka" @if("Shizuoka" === (int)old('location')) selected @endif>静岡県</option>
                <option value="Aichi" @if("Aichi" === (int)old('location')) selected @endif>愛知県</option>
                <option value="Mie" @if("Mie" === (int)old('location')) selected @endif>三重県</option>
                <option value="Shiga" @if("Shiga" === (int)old('location')) selected @endif>滋賀県</option>
                <option value="Kyoto" @if("Kyoto" === (int)old('location')) selected @endif>京都府</option>
                <option value="Osaka" @if("Osaka" === (int)old('location')) selected @endif>大阪府</option>
                <option value="Hyogo" @if("Hyogo" === (int)old('location')) selected @endif>兵庫県</option>
                <option value="Nara" @if("Nara" === (int)old('location')) selected @endif>奈良県</option>
                <option value="Wakayama" @if("Wakayama" === (int)old('location')) selected @endif>和歌山県</option>
                <option value="Tottori" @if("Tottori" === (int)old('location')) selected @endif>鳥取県</option>
                <option value="Okayama" @if("Okayama" === (int)old('location')) selected @endif>岡山県</option>
                <option value="Hiroshima" @if("Hiroshima" === (int)old('location')) selected @endif>広島県</option>
                <option value="Yamaguchi" @if("Yamaguchi" === (int)old('location')) selected @endif>山口県</option>
                <option value="Tokushima" @if("Tokushima" === (int)old('location')) selected @endif>徳島県</option>
                <option value="Kagawa" @if("Kagawa" === (int)old('location')) selected @endif>香川県</option>
                <option value="Ehime" @if("Ehime" === (int)old('location')) selected @endif>愛媛県</option>
                <option value="Kochi" @if("Kochi" === (int)old('location')) selected @endif>高知県</option>
                <option value="Fukuoka" @if("Fukuoka" === (int)old('location')) selected @endif>福岡県</option>
                <option value="Saga" @if("Saga" === (int)old('location')) selected @endif>佐賀県</option>
                <option value="Nagasaki" @if("Nagasaki" === (int)old('location')) selected @endif>長崎県</option>
                <option value="Kumamoto" @if("Kumamoto" === (int)old('location')) selected @endif>熊本県</option>
                <option value="Oita" @if("Oita" === (int)old('location')) selected @endif>大分県</option>
                <option value="Miyazaki" @if("Miyazaki" === (int)old('location')) selected @endif>宮崎県</option>
                <option value="Kagoshima" @if("Kagoshima" === (int)old('location')) selected @endif>鹿児島県</option>
                <option value="Okinawa" @if("Okinawa" === (int)old('location')) selected @endif>沖縄県</option>
              </select>
            </td>
          </tr>
          <tr class="post-row">
            <th class="post-head">GENRE</th>
              <td class="post-data">
                <div class="genre">
                  <input type="checkbox" id="spot" name="genre[]" value="spot" @if("spot" === (int)old('genre')) checked @endif>
                  <label for="spot">Spot</label>
                </div>
                <div class="genre">
                  <input type="checkbox" id="accommodation" name="genre[]" value="accm" @if("accm" === (int)old('genre')) checked @endif>
                  <label for="accommodation">Accom</label>
                </div>
                <div class="genre">
                  <input type="checkbox" id="restaurant" name="genre[]" value="restaurant" @if("restaurant" === (int)old('genre')) checked @endif>
                  <label for="restaurant">Restaurant</label>
                </div>
                <div class="genre">
                  <input type="checkbox" id="shope" name="genre[]" value="shop" @if("shop" === (int)old('genre')) checked @endif>
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