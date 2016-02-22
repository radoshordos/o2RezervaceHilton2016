<footer class="footer">
    @if ($is_visitor === true)
        <p>Do vyprodání zbývá ještě <strong>{{ $volne_vstupenky }}</strong> lístků. Poté se bude možné přihlásit jen jako náhradník.</p>
    @else
        <p>Vstupenky jsou vyčerpány, ale můžete se přihlásit jako <strong>{{ abs($volne_vstupenky) }}</strong>. náhradník.</p>
    @endif
</footer>