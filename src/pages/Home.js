/** @format */

import React, {useRef, useState, useEffect} from 'react';
import {SafeAreaView, StyleSheet, Text, ToastAndroid, View} from 'react-native';
import {TouchableOpacity} from 'react-native-gesture-handler';

import Header from '../components/Header';
import { useNavigation } from '@react-navigation/native';

export default function Home({navigation}) {
	// const navigation = useNavigation();

  return (
    <SafeAreaView style={{flex: 1}}>
      <Header headerText="Home"></Header>
      <View style={styles.container}>
        {/* <AlertMessage text="asd" style={{ backgroundColor: '#e63c3c' }}></AlertMessage> */}
        {/* 
        <Button
          handler={() => {}}
          text="NEXT"
          btnStyle={styles.loginBtn}></Button> */}

        <View style={styles.itemList}>
          <TouchableOpacity
            onPress={() => {
				navigation.navigate('Contacts');
				
            }}
            style={styles.item}>
            <Text style={styles.itemText}>Contacts</Text>
          </TouchableOpacity>
        </View>
      </View>
    </SafeAreaView>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#f9f8fe',
    width: '100%',
    paddingHorizontal: 20,
  },
  loginBtn: {
    width: '80%',
    backgroundColor: '#0071cd',
  },
  itemList: {
    marginTop: 20,
  },
  item: {
    width: '100%',
    height: 80,
    borderRadius: 8,
    backgroundColor: '#fff',
    paddingHorizontal: 30,
    shadowColor: '#000',
    shadowOffset: {width: 1, height: 1},
    shadowOpacity: 0.4,
    shadowRadius: 3,
    elevation: 1,
  },
  itemText: {
    fontSize: 22,
    color: '#2d3440',
    paddingTop: 25,
  },
});
