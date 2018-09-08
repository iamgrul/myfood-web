Preparation (should be installed)
-
1) Database

2) npm


First Install
-

1) If not configured connection with database: 
    - go to folder "/www"
    - configure "wp-config.php" file (with some text editor, or anything else)

2) Go to root folder (where gulpfile.js) (in terminal) 

3) You can run next command (in terminal) ('command' - 'description')
    - 'gulp prod-js' - will compile "app.min.js" file
    - 'gulp styles' - will compile "styles.min.js" file
    - 'gulp styles-norem' - will compile "styles-norem.min.js" file
    
(not all available command presented, but most needed)

Adding new script
- 
If you want add new script 
1) Paste script to folder "dev/javascripts"
2) Add it to query "jsbuilderquery" in "gulpfile.js"
3) Than recompile scripts ('gulp prod-js')

Example: you need to add "example.js" to project. You have to insert into  "dev/javascripts" folder, so you got "dev/javascripts/example.js" file. 
Then open "gulpfile.js", and add next row to "jsbuilderquery" variable: "path.inputs.js + 'example.js',". Now run "gulp prod-js".
You got your script compiled to "app.min.js"
