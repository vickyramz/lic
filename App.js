/**
 * Sample React Native App
 * https://github.com/facebook/react-native
 *
 * @format
 * @flow strict-local
 */

import React, { useEffect, useState } from 'react';
import 'react-native-gesture-handler';
import { NavigationContainer } from '@react-navigation/native';
import { createStackNavigator } from '@react-navigation/stack';
import Home from './src/pages/Home';
import { SafeAreaProvider, SafeAreaView } from 'react-native-safe-area-context';
import { StatusBar } from 'react-native';
import Contacts from './src/pages/Contacts';
import AddEditContact from './src/pages/AddEditContact';
import Login from './src/pages/Login';
import { storage } from './src/services/storage.service';

const Stack = createStackNavigator();



const App = () => {
  const [initialRoute, setInitialRoute] = useState('Login');

  useEffect(() => {
    initializeRoute()
  }, [])


  const initializeRoute = async () => {
    const loggedIn = await storage.retrieveData('loggedIn')
    if (loggedIn) {
      setInitialRoute('Home');
    }
  }
  return (
    <>
      <SafeAreaProvider>
        <SafeAreaView style={{ flex: 1 }}>
          <NavigationContainer>
            <StatusBar
              barStyle="dark-content"
              hidden={false}
              backgroundColor="#3880ff"
              translucent={true}

            />
            <Stack.Navigator initialRouteName={initialRoute}>

              <Stack.Screen
                name="Login"
                options={{ title: '', headerShown: false }}
                component={Login}
              />
              <Stack.Screen
                name="Home"
                options={{ title: '', headerShown: false }}
                component={Home}
              />

              <Stack.Screen
                name="Contacts"
                options={{ title: '', headerShown: false }}
                component={Contacts}
              />

              <Stack.Screen
                name="AddEditContact"
                options={{ title: '', headerShown: false }}
                component={AddEditContact}
              />
            </Stack.Navigator>
          </NavigationContainer>
        </SafeAreaView>
      </SafeAreaProvider>
    </>
  );
};

export default App;
