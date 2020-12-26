import React from 'react';
import {StyleSheet, Text, View, Button, Image} from 'react-native';
import {TouchableOpacity} from 'react-native-gesture-handler';

export default function Header({
  headerText,
  hasAction,
  actionText,
  actionEvent,
}) {
  return (
    <View style={styles.header}>
      <Text style={styles.headerText}>{headerText}</Text>

      {hasAction ? (
        <TouchableOpacity onPress={actionEvent}>
          <Text style={styles.action}>{actionText}</Text>
        </TouchableOpacity>
      ) : (
        <></>
      )}
    </View>
  );
}

const styles = StyleSheet.create({
  header: {
    height: 50,
    flex: 0.1,
    flexDirection: 'row',
    justifyContent: 'space-between',
    width: '100%',
    backgroundColor: '#3880ff',
    alignItems: 'center',
    paddingHorizontal: 40,
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
