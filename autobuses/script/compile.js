const path= require('path');
const fs = require('fs');
const solc = require('solc');
const chalk = require('chalk');

const contractPath = path.resolve(__dirname, "../contracts", "UserContract.sol");
const source = fs.readFileSync(contractPath, 'utf8');

//console.log(source);
//exportamos los tipos a importar de otro modulo
module.exports = solc.compile(source, 1).contracts[':UserContract'];

//console.log(chalk.green(bytecode));
//console.log(chalk.blue(interface));

