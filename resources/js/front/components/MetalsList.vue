<template>
    <div>
        <span class="column-title">Другие металлы</span>
        <div class="metall-table-container shadow-element">
            <table class="metall-table">
                <tr class="tr">
                    <th><span>Металл</span></th>
                    <th><span>Курс (за тонну)</span></th>
                </tr>
                <metals-item metal="Aluminium" name="al">Алюминий</metals-item>
                <metals-item metal="Copper" name="al">Медь</metals-item>
                <metals-item metal="Zinc" name="al">Цинк</metals-item>
                <metals-item metal="Nickel" name="al">Никель</metals-item>
                <metals-item metal="Lead" name="al">Свинец</metals-item>
                <metals-item metal="Tin" name="al">Олово</metals-item>
                <metals-item metal="Aluminium Alloy" name="al">Алюминиевый сплав</metals-item>
                <metals-item metal="NASAAC" name="al">NASAAC</metals-item>
                <metals-item metal="Cobalt" name="al">Кобальт</metals-item>
                <metals-item metal="Gold" name="al">Золото</metals-item>
                <metals-item metal="Steel Scrap" name="al">Стальной лом</metals-item>
                <metals-item metal="Steel Rebar" name="al">Стальная арматура</metals-item>

            </table>
            <div class="link-box">
                Данные предоставлены сервисом <a href="https://lme.com" target="_blank">www.lme.com</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MetalCostsList",
    }
</script>

<style scoped>

</style>
