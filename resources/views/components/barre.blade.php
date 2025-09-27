<div class="barre" style="width:100%;background-color:lavender;padding:20px 10px;position:fixed;top:0;left:0;z-index:1000;box-shadow:0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);font-weight:bold;font-size:2.2em;display:flex;align-items:center;justify-content:space-between;">
    <span style="color:darkslateblue;font-size:1em;display:flex;align-items:center;gap:10px;">
        <i class="fa-solid fa-circle-user"></i>
        @isset($user)
            {{ $user->name }}
        @else
            Admin
        @endisset
    </span>
    <span style="font-size:0.7em;color:darkslateblue;">Bienvenue</span>
</div>
<style>
@media (max-width: 900px) {
    .barre {
        font-size: 1.2em !important;
        padding: 12px 5px !important;
    }
}
@media (max-width: 600px) {
    .barre {
        font-size: 1em !important;
        flex-direction: column;
        align-items: flex-start;
        gap: 5px;
        padding: 10px 2px !important;
    }
}
</style>
