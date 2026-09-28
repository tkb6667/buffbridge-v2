<x-guest-layout>

    <style>
  
        .sc_form_address_field{
            text-align: center !important;
        }
        
    </style>
<style>
@media (max-width: 768px) {
  .sc_form_address_field {
    display: none;
  }
}
</style>

    <link rel="stylesheet" href="{{ asset('css/skin.css') }}" type="text/css" media="all" />
    <div class="page_content_wrap page_paddings_no">
        <div class="content">
            <article class="post_item post_item_single">
                <section class="post_content">
                    <!-- Contact Us Today -->
                    <div class="content_wrap">
                        <div class="empty_space height_6_75em"></div>
                        <div id="sc_form_2_wrap" class="sc_form_wrap">
                            <div id="sc_form_2" class="sc_form sc_form_style_form_2">
                                <h2 class="sc_form_title sc_item_title">
                                    Profile
                                </h2>
                                <div class="sc_form_descr sc_item_descr">
                                    {{-- <p class="margin_bottom_null">Your email address will not be published.</p>
                                    <p> Required fields are marked *</p> --}}
                                </div>
                                <div class="sc_columns columns_wrap">
                                    <div class="sc_form_address column-1_3">
                                        <div class="sc_form_address_field  pt-5">
                                            <span class="sc_form_address_label">Name</span>
                                            {{-- <span class="sc_form_address_data">{{ $user->name }}</span> --}}
                                        </div>
                                        <div class="sc_form_address_field  pt-5">
                                            <span class="sc_form_address_label">Email</span>
                                            {{-- <span class="sc_form_address_data">{{ $user->email }}</span> --}}
                                        </div>
                                        <div class="sc_form_address_field  pt-5">
                                            <span class="sc_form_address_label">Phonenumber</span>
                                            {{-- <span class="sc_form_address_data">{{ $user->phone }}</span> --}}
                                        </div>
                                        <div class="sc_form_address_field  pt-5">
                                            <span class="sc_form_address_label">Address</span>
                                            {{-- <span class="sc_form_address_data">{{ $user->house_number }}</span> --}}
                                        </div>
                                        <div class="sc_form_address_field  pt-5">
                                            <span class="sc_form_address_label">Subdistrict</span>
                                            {{-- <span class="sc_form_address_data">{{ $user->subdistrict }}</span> --}}
                                        </div>
                                        <div class="sc_form_address_field  pt-5">
                                            <span class="sc_form_address_label">District</span>
                                            {{-- <span class="sc_form_address_data">{{ $user->district }}</span> --}}
                                        </div>
                                        <div class="sc_form_address_field  pt-5">
                                            <span class="sc_form_address_label">Province</span>
                                            {{-- <span class="sc_form_address_data">{{ $user->province }}</span> --}}
                                        </div>
                                        <div class="sc_form_address_field  pt-5">
                                            <span class="sc_form_address_label">Postal code</span>
                                            {{-- <span class="sc_form_address_data">{{ $user->postal_code }}</span> --}}
                                        </div>
                                    </div><div class="sc_form_fields column-2_3">
                                        <form method="post" action="{{ route('profile.update') }}" id="profile-form">
                                            @csrf
                                            @method('patch')
                                            <div class="sc_form_info">
                                                <div class="sc_form_item sc_form_field label_over">
                                                    <label class="required" for="sc_form_username">Name</label>
                                                    <input id="sc_form_username" type="text" name="name" placeholder="Name" value="{{ $user->name }}" required>
                                                </div>
                                                <div class="sc_form_item sc_form_field label_over">
                                                    <label class="required" for="sc_form_email">E-mail</label>
                                                    <input id="sc_form_email" type="text" name="email" placeholder="E-mail" value="{{ $user->email }}" disabled>
                                                </div>
                                                <div class="sc_form_item sc_form_field label_over">
                                                    <label class="required" for="sc_form_phone">Phonenumber</label>
                                                    <input id="sc_form_phone" type="text" name="phone" placeholder="Phonenumber" onkeypress='return event.charCode >= 48 && event.charCode <= 57' minlength="10"  maxlength="10" value="{{ $user->phone }}" required>
                                                </div>
                                            </div>
                                            <div class="sc_form_info">
                                                <div class="sc_form_item sc_form_field label_over">
                                                    <label class="required" for="sc_form_house_number">Address</label>
                                                    <input id="sc_form_house_number" type="text"  name="house_number" placeholder="Address" value="{{ $user->house_number }}">
                                                </div>
                                                <div class="sc_form_item sc_form_field label_over">
                                                    <label class="required" for="sc_form_subdistrict">Subdistrict</label>
                                                    <input id="sc_form_subdistrict" type="text"  name="subdistrict" placeholder="Subdistrict" value="{{ $user->subdistrict }}">
                                                </div>
                                                <div class="sc_form_item sc_form_field label_over">
                                                    <label class="required" for="sc_form_district">District</label>
                                                    <input id="sc_form_district" type="text"  name="district" placeholder="District" value="{{ $user->district }}">
                                                </div>
                                                <div class="sc_form_item sc_form_field label_over">
                                                    <label class="required" for="sc_form_province">Province</label>
                                                    <input id="sc_form_province" type="text"  name="province" placeholder="Province" value="{{ $user->province }}">
                                                </div>
                                                <div class="sc_form_item sc_form_field label_over">
                                                    <label class="required" for="sc_form_postal_code">Postal code</label>
                                                    <input id="sc_form_postal_code" type="text"  name="postal_code" placeholder="Postal code" value="{{ $user->postal_code }}">
                                                </div>
                                            </div>
                                            <div class="sc_form_item sc_form_button">
                                                {{-- <button class="sc_button sc_button_style_dark" type="submit">Save</button> --}}
                                                <input class="sc_button sc_button_style_dark" type="submit" value="Save" onclick="event.preventDefault(); document.getElementById('profile-form').submit();">
                                            </div>
                                            <div class="result sc_infobox"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="empty_space height_8_7em"></div>
                    </div>
                    <!-- /Contact Us Today -->
                </section>
            </article>
        </div>
    </div>
    <x-slot name="script">
        {{-- <script>
            @if(session('status'))
                Toastify({
                    text: "{{ session('status') }}",
                    className: "success",
                    style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                    },
                }).showToast();
            @endif
        </script> --}}
    </x-slot>
</x-guest-layout>
