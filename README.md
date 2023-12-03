# Dev Logger plugin

## Intent
Provide basic logging for development purposes.

## Usage

### Send a message to the default log
log_to_dev( "I'm a message" );

### Send a message to a custom log
log_to_dev( "I'm a message", 'custom-log-filename' );

## Future
The plugin currently lacks:
- a guard for bad file names
- a guard or processing for non-string values
  - I am going to have non-strings dumped before logging

## Notes
100% PHP

On deactivation, it will delete the logs directory and all the files in it.

Have questions or comments? Hit me up at https://twitter.com/_JoshRobbs
