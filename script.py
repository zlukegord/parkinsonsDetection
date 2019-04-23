import amfm_decompy.basic_tools as basic
import amfm_decompy.pYAAPT as pYAAPT
import matplotlib.pyplot as plt
import numpy as np
import sys

if __name__ == "__main__":
	# load audio
	print(sys.argv[1])
	filename = sys.argv[1]
	signal = basic.SignalObj(filename)
	# YAAPT pitches 
	pitchY = pYAAPT.yaapt(signal, frame_length=40, tda_frame_length=40, f0_min=75, f0_max=600)
	#get values
	val = pitchY.values_interp
	pred_UPDRS = 15.82 - 0.376 * np.median(val) + 0.305 * val.mean() \
                     - .024 * val.std()-.005 * val.max()
	print(pred_UPDRS)
