import React from "react";
import { StyleSheet, Text, View } from "react-native";

export default function AlertMessage({ text, style }) {

    return (
        <View >
            <View style={[styles.Alert, style]}>
                <Text allowFontScaling={true} style={styles.AlertTxt}>{text}</Text>
            </View>
        </View>
    );
}

const styles = StyleSheet.create({
    Alert: {
        height: 30,
        // backgroundColor: "#e63c3c",
        justifyContent: 'center',
        alignItems: 'center',
        zIndex:100
    },
    AlertTxt: {
        color: '#fff',
    }
});
