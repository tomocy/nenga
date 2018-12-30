<form action="{{ route('nenga.create') }}" method="POST" class="nenga-form">
    @csrf
    <div class="form-group">
        <label for="content-input" class="form-label">謝辞・祈り・お願い</label>
        <textarea name="content" rows="10" id="content-input" class="form-control" placeholder="本年もどうぞよろしくお願い申し上げます"></textarea>
    </div>
    <div class="form-group">
        <label for="author-input" class="form-label">差出人</label>
        <input type="text" name="author" id="author" class="form-control" placeholder="年賀太郎">
    </div>
    <div>
        <button class="btn btn-nenga">作成</button>
    </div>
</form>
