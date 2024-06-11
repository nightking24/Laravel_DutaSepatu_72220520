@section("navs")
<div class="col-md-2 vh-100">
    <div class="row mt-4">
      <div class="col-3">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link {{  ($key == "home") ? "active":"" }}" id="v-pills-home-tab" href="/">Home</a>
          <a class="nav-link {{  ($key == "sepatu") ? "active":"" }}" id="v-pills-profile-tab" href="/sepatu">Sepatu</a>
          <a class="nav-link {{  ($key == "keranjang") ? "active":"" }}" id="v-pills-messages-tab" href="/keranjang">Keranjang</a>
          <a class="nav-link {{  ($key == "tentang") ? "active":"" }}" id="v-pills-settings-tab" href="/tentang">Tentang</a>
        </div>
      </div>
    </div>
  </div>
  @show()