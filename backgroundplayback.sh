#!/bin/bash
class_1="$(grep -l "background_mode" *.java)"
class_1="${class_1%.java}"

method_1="$(grep -B 3 "background_mode" $class_1.java | head -n 1 | egrep -o "[a-z]\(")"
method_1="${method_1%(}"

field_1="$(grep -B 2 "background_mode" $class_1.java | head -n 1 | egrep -o "this\.[a-z]\.[a-z]" | cut -d"." -f 2)"

subfield_1="$(grep -B 2 "background_mode" $class_1.java | head -n 1 | egrep -o "this\.[a-z]\.[a-z]" | cut -d"." -f 3)"


class_2="$(egrep -l "return this.[a-z] == 0 \|\| this.[a-z] == 3 \|\| this.[a-z] == 4 \|\| this.[a-z] == 5" *.java)"
class_2="${class_2%.java}"

method_2="$(egrep -B 1 "return this.[a-z] == 0\;" $class_2.java | head -n 1 | egrep -o "[a-z]\(")"
method_2="${method_2%(}"

field_2="$(egrep -o "boolean [a-z]\;" $class_2.java | cut -d" " -f2 | tr -d "\;")"


class_3="$(grep -l "background_audio_policy" *.java)"
class_3="${class_3%.java}"

method_3="$(egrep -B 1 "background_audio_policy" $class_3.java | head -n 1 | egrep -o "[a-z]\(")"
method_3="${method_3%(}"

printf "\t\t\t\"CLASS_1\" => \"$class_1\",\n"
printf "\t\t\t\"METHOD_1\" => \"$method_1\",\n"
printf "\t\t\t\"FIELD_1\" => \"$field_1\",\n"
printf "\t\t\t\"SUBFIELD_1\" => \"$subfield_1\",\n"
printf "\n"
printf "\t\t\t\"CLASS_2\" => \"$class_2\",\n"
printf "\t\t\t\"METHOD_2\" => \"$method_2\",\n"
printf "\t\t\t\"FIELD_2\" => \"$field_2\",\n"
printf "\n"
printf "\t\t\t\"CLASS_3\" => \"$class_3\",\n"
printf "\t\t\t\"METHOD_3\" => \"$method_3\")\n"
