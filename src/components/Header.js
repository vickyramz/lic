import React from 'react';
import { StyleSheet, Text, View, Button, Image } from 'react-native';
import { TouchableOpacity } from 'react-native-gesture-handler';

export default function Header({
  headerText,
  hasAction,
  actionText,
  actionEvent,
  showBack,
  backEvent
}) {
  return (
    <View style={styles.header}>
      {showBack ? (
        <TouchableOpacity onPress={backEvent}>
          <Image

            source={require('../assets/images/left-arrow.png')}
            style={{ width: 20, height: 20, marginRight: 20 }}></Image>
        </TouchableOpacity>
      ) : (
          <></>
        )}
      <View style={{ width: '80%', flexDirection: 'row', justifyContent: 'space-between', }}>
        <Text style={styles.headerText}>{headerText}</Text>

        {hasAction ? (
          <TouchableOpacity onPress={actionEvent}>
            <Text style={styles.action}>{actionText}</Text>
          </TouchableOpacity>
        ) : (
            <></>
          )}
      </View>
    </View>
  );
}

const styles = StyleSheet.create({
  header: {
    height: 50,
    flex: 0.1,
    flexDirection: 'row',
    // justifyContent: 'space-between',
    width: '100%',
    backgroundColor: '#3880ff',
    alignItems: 'center',
    paddingHorizontal: 20,
    elevation: 200,
  },

  headerText: {
    fontSize: 25,
    color: '#fff',
    fontWeight: '500',
  },
  action: {
    fontSize: 22,
    color: '#fff',
    fontWeight: '500',
  },
});
