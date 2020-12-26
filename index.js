/**
 * @format
 */

import {AppRegistry} from 'react-native';
import App from './App';
import {name as appName} from './app.json';
import axios from "axios";


// axios.defaults.baseURL = "http://endln.com/linch/";
axios.defaults.baseURL = "http://lichtensteinre.com/api/";

// export default function Main() {
//   return (
//     <PaperProvider>
//       <App />
//     </PaperProvider>
//   );
// }

AppRegistry.registerComponent(appName, () => App);
