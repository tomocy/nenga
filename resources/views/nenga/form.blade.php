<form action="{{ route('nenga.create') }}" method="POST" class="nenga-form">
    @csrf
    <div class="form-group">
        <label for="content-input" class="form-label">謝辞・祈り・お願い（50文字まで）</label>
        <textarea name="content" rows="3" id="content-input" class="form-control" placeholder="本年もどうぞよろしくお願い申し上げます" maxlength="50" required></textarea>
    </div>
    <div class="form-group">
        <label for="author-input" class="form-label">差出人（10文字まで）</label>
        <input type="text" name="author" id="author" class="form-control" placeholder="ともしー" maxlength="10" required>
    </div>
    <div>
        <button class="btn btn-nenga">作成</button>
    </div>
</form>
