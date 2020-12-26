import React from "react";
import { StyleSheet, Text, TouchableOpacity, View } from "react-native";

export default function Button(props) {
  const { handler, text, btnStyle, textStyle, disabled } = props;

  const handleOnPress = () => {
    if (!disabled) {
      handler()
    }
  }
  return (
    <View style={[styles.btn, btnStyle, disabled ? styles.disabled : '']}>
      <TouchableOpacity onPress={handleOnPress}>
        <Text allowFontScaling={true} style={[styles.btnText, textStyle]}>{text}</Text>
      </TouchableOpacity>
    </View>
  );
}

const styles = StyleSheet.create({
  btn: {
    height: 50,
    padding: 10,
    marginTop: 30,
    borderRadius: 8,
  },
  btnText: {
    color: "white",
    fontSize: 20,
    fontWeight: "600",
    marginLeft: "auto",
    marginRight: "auto",
    alignItems: "center",
    fontFamily: "nunito",
    // 
  },
  disabled: {
    opacity: 0.5
  }
});
