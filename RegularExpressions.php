<?php
#Здесь описаны примеры регулярных выражений и их использование

$str = 'I am learning    PHP';

#функция preg_split(pattern, subject) эквивалентна работе строковой функции explode, где pattern - Шаблон регулярного выражения, а subject - строка(переменная) в которой мы будем проводить соответствующие операции, а именно - деления на массив


$res = preg_match('/[a]/', $str);

echo '<pre>';
var_dump($res);
echo '</pre>';

#функция preg_match(pattern, subject) как и её более "глобальная" preg_match_all - для поиска подстроки в строке. Первым параметром функция принимает шаблон регулярного выражения (pattern), а вторым - строку, в которой будем искать что-то искать по шаблону, а третьим необязательным параметром matches функция принимает вхождения найденных результатов

#pattern - это шаблон регулярных выражений, который указывается в виде строки кавычками и ограничителями, например - два слеша //

# '/am/' - мы в шаблон можем поместить слова или последовательность символов, которые мы ищем
# '/[zx]/'- С помощью этого шаблона можем найти символ в строке, причем можем их указывать сколько угодно, без запятых и пробелов. Если нам нужно найти все вхождения символов в строке, то пишем функцию preg_match_all
# '/[a-z]/'- C помощью этого шаблона можно найти диапазон символов, но есть нюанс, данный шаблон будет искать только прописные символы, не ЗАГЛАВНЫЕ. Чтобы можно было искать и заглавные символы необходимо без пробелов и запятых добавить шаблон диапазон ЗАГЛАВНЫХ. см. шаблон ниже.
# '/[a-zA-Z]/' - см. описание шаблона выше.

#Все эти шаблоны можно составлять самому, но есть спецсимволы, которые позволяют упростить написание шаблонов, давайте с ними познакомимся:
# '/[\w]/' - данный спецсимвол \w позволяет нам искать: Все буквы латинского алфавита, цифры и нижнее подчеркивание
# '/[\W]/' - данный спецсимвол \W является инвертированной(обратной) записью выше и позволяет нам с помощью него искать ВСЕ символы, которые не подпадают под \w - пробелы, запятые, кавычки и тд.
# '/[\d]/' - данный спецсимвол \d позволит нам найти все цифры
# '/[\D]/' - обратная запись спецсимвола \d позволит нам найте ВСЕ символы, которые цифрами не являются
# '/[\n]/' - данный спецсимвол \n позволит нам найти все переносы строки
# '/[\s]/' - данный спецсимвол \s позволит нам найти все символы разделители(пробелы) в строке
# '/[\S]/' - обратная запись спецсимвола \s позволит нам найте ВСЕ символы, которые символами разделителя(пробелами) не являются
# '/[\t]/' - данный спецсимвол \t позволит нам найти все символы табуляции(tab) в строке
# '/a(s|\s)/' - С помощью этого шаблона можно найти все вхождения символа a и последующей за ней 1) символа s или (|) 2) пробела. В скобках указана так называемая "подмаска", которая позволяет сделать вариацию поиска ещё более точной.
# '/a./' - С помощью этого шаблона можно найти все вхождения символа а (здесь а для примера - можно найти любой другой символ) с любым символом. Точка (.) в регулярных выражениях отвечает за любой другой символ.
# '/\s{2,}\w/' - С помощью этого шаблона можно найти все вхождения двух пробелов и любого символа. В фигурных скобках {2,} указывается количество, через запятую, одних и тех же и более символов, идущих друг за другом - это может быть 2, может 10, а может 100. Данная запись позволяет нам это сделать. Также в этих фигурных скобках можно указать диапазон, например, если поставить в этом шаблоне {2,4} то здесь уже будут находится все вхождения от двух до четырех пробелов.
# '/[^,\s]\s{2,4}\w//' - С помощью этого шаблона можно найти все вхождения диапазона пробелов от двух до четырех и символов лат. алфавита, цифр и нижнего подчеркивания, НО перед этой конструкцией стоит в квадратных скобках отрицание (^) запятой и пробела.
# Фигурные скобки {} в регулярных выражениях называются системой повторений
# Квадратные скобки [] в регулярных выражениях называются символьным классом
# Символ галочки ^ в регулярных выражениях называется системой отрицаний, также если эта галочка будет стоять в начале шаблона, то она позволит нам искать что-то с начала строки
# Символ доллара $ в шаблонах регулярных выражений позволяет искать с конца строки
# Символ плюса + в шаблонах регулярных выражений эквивалентен выражениям {1,} или {0,} и является их фактически сокращенной записью и позволяет найти символ один раз, например:
# '/[A-Z]+/' - Позволит найти все сочетания Заглавных букв от A до Z один раз
# Знак звездочки * в шаблонах регулярных выражений означает ноль и более раз
# '/[\d]{3}\s*_/' - Данный шаблон найдет числа с возможным повторением до 3х раз, а также с возможнным пробелом и нижнем подчеркиванием.
# Знак вопроса ? в регулярных выражениях называется ограничением жадности квантификатора.  Такое поведение операторов (квантификаторов) повторения называется жадностью - они стремятся забрать как можно больше. Такая особенность не всегда полезна и, к счастью, ее можно отменить, говоря по-другому - ограничить жадность. Делается это с помощью добавления знака '?' к оператору повторения: вместо жадных '+' и '*' мы напишем '+?' и '*?' - они будут не такие жадные.
# В регулярных выражениях существует такое понятие как флаги(модификаторы), познакомимся с некоторыми из них:
# u - Этот флаг позволяет работать с мультибайтовыми кодировками (Мастхев для работы с кириллицей)
# U - Этот флаг инвертирует жадность квантификаторов, таким образом они по умолчанию не жадные. Но становятся жадными, если за ними следует символ ?.
# i - Этот флаг игнорирует  регистр, '#[a-z]#i' - такое теперь найдет и заглавные буквы.
# m - Данный флаг работает с многострочным текстом и позволяет искать в них
# s - А вот этот флаг - уже для работы с однострочным