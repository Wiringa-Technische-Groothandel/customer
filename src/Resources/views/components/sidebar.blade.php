<div class="list-group">
    <a href="{{ route('customer::account.dashboard') }}"
       class="list-group-item {{ Route::is('customer::account.dashboard') ? 'active' : '' }}">
        Overzicht
    </a>
    @if (Auth::user()->getManager())
        <a href="{{ route('customer::account.accounts::view') }}"
           class="list-group-item {{ Route::is('customer::account.accounts::view') ? 'active' : '' }}">
            Sub-accounts
        </a>
    @endif
    <a href="{{ route('customer::account.password::view') }}"
       class="list-group-item {{ Route::is('customer::account.password::view') ? 'active' : '' }}">
        Wachtwoord wijzigen
    </a>
    <a href="{{ route('customer::account.favorites::view') }}"
       class="list-group-item {{ Route::is('customer::account.favorites::view') ? 'active' : '' }}">
        Favorieten
    </a>
    <a href="{{ route('customer::account.history::view') }}"
       class="list-group-item {{ Route::is('customer::account.history::view') ? 'active' : '' }}">
        Bestelgeschiedenis
    </a>
    <a href="{{ route('customer::account.addresses::view') }}"
       class="list-group-item {{ Route::is('customer::account.addresses::view') ? 'active' : '' }}">
        Adressenlijst
    </a>
    <a href="{{ route('customer::account.discountfile::view') }}"
       class="list-group-item {{ Route::is('customer::account.discountfile::view') ? 'active' : '' }}">
        Kortingsbestand genereren
    </a>
</div>
